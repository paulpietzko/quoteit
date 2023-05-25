let previousQuote = "";
let wasPreviousSame = false;

function fetchQuote() {
    $.getJSON("data.php", function (data) {
      if (data.error === -1) {
        console.error("An error occurred while fetching quote data.");
      } else {
        if (previousQuote === data.quote) {
            wasPreviousSame = true;
          fetchQuote(); 
        } else {
          previousQuote = data.quote;
          $(".quote, .author").addClass("fade-out");
          setTimeout(function () {
            $(".quote").text(data.quote);
            $(".author").text(data.author);
            $(".quote, .author").removeClass("fade-out");
            wasPreviousSame = false;
          },
          !wasPreviousSame ? 1000 : 0
        );
        console.log(data.quote + " + " + data.author);
        }
      }
    });
  }
  
  $(document).ready(function () {
    fetchQuote(); 
    setInterval(fetchQuote, 5000); 
  });
  
