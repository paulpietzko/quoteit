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
    fetchQuote();
  } else {
    console.log("Fetching quote");
    incrementByOne(data.ID); // assuming that data contains an 'id' field
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

function incrementByOne(id) {
  console.log(id);
  $.ajax({
    url: "http://localhost:8080/quoteit/increment.php",
    type: "POST",
    data: { id: id },
    success: function (response) {
      console.log(response);
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });
}

$(document).ready(function () {
  fetchQuote();
  setInterval(fetchQuote, 5000);
});
