"use strict";

var previousQuote = "";

function fetchQuote() {
  $.getJSON("data.php", function (data) {
    if (data.error === -1) {
      console.error("An error occurred while fetching quote data.");
      return;
    }
    handleNewQuote(data);
  });
}

function handleNewQuote(data) {
  if (previousQuote === data.quote) {
    // Quote is the same as the previous one, fetch a new one
    fetchQuote();
  } else {
    // New quote, update display
    previousQuote = data.quote;
    fadeOutAndUpdate(data.quote, data.author);
  }
}

function fadeOutAndUpdate(quote, author) {
  $(".quote, .author").addClass("fade-out");

  setTimeout(function () {
    $(".quote").text(quote);
    $(".author").text(author);
    $(".quote, .author").removeClass("fade-out");
  }, 1000);
}

$(document).ready(function () {
  fetchQuote();
  setInterval(fetchQuote, 5000);
});
