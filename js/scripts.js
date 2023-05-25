
$(document).ready(function () {
  fetchQuote();
  setInterval(fetchQuote, 5000);
});