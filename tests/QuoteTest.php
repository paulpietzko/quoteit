<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class QuoteTest extends TestCase
{

    // Positiver oder "Happy Path" Testfall
    public function testFetchQuote()
    {
        $servername = "127.0.0.1";
        $username = "quotout";
        $password = "qu0t_";
        $dbname = "citation";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM citation ORDER BY RAND() LIMIT 1";
        $result = $conn->query($sql);

        // Überprüfen, ob das Resultat mindestens eine Zeile hat
        $this->assertTrue($result->num_rows > 0);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Überprüfen, ob das Zitat und der Autor richtig formatiert sind
            $this->assertIsString($row["quote"]);
            $this->assertIsString($row["first_name"]);
            $this->assertIsString($row["last_name"]);
        }

        $conn->close();
    }

    // Negativer Testfall
    public function testDbConnectionFailure()
    {
        $servername = "wrongServer";
        $username = "quotout";
        $password = "qu0t_";
        $dbname = "citation";

        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
        } catch (mysqli_sql_exception $exception) {
            $this->assertTrue(true);
            return;
        }

        // Überprüfen, ob die Verbindung fehlerhaft ist
        $this->assertTrue($conn->connect_error);
    }

    // Grenzwert Testfall
    public function testTenEntryCitationTable()
    {
        $servername = "127.0.0.1";
        $username = "quotout";
        $password = "qu0t_";
        $dbname = "citation";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM citation";
        $result = $conn->query($sql);

        // Überprüfen, ob das Resultat genau 10 Zeilen hat
        $this->assertTrue($result->num_rows == 10);

        $conn->close();
    }

    // Teste ob das HTML-Konstrukt korrekt ist
    public function testRendersQuoteAndAuthor()
    {
        // Führen Anwendung aus und erfassen Sie die Ausgabe
        ob_start();
        include 'index.php';
        $output = ob_get_clean();

        // Erstellen eines neuen Crawlers und übergeben die gerenderte Ausgabe
        $crawler = new Crawler($output);

        // Überprüfen, ob ein blockquote-Element mit der Klasse "quote" gerendert wird
        $this->assertEquals(
            1,
            $crawler->filter('blockquote.quote')->count()
        );

        // Überprüfen, ob ein blockquote-Element mit der Klasse "author" gerendert wird
        $this->assertEquals(
            1,
            $crawler->filter('blockquote.author')->count()
        );
    }
}