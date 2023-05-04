const quotes = [
  "When the past comes knocking, don't answer. It has nothing new to tell you.",
  "Success is not final, failure is not fatal: it is the courage to continue that counts.",
  "Believe you can and you're halfway there.",
  "If you want to live a happy life, tie it to a goal, not to people or things.",
  "Happiness is not something ready made. It comes from your own actions.",
];

const quote = document.querySelector(".quote");

setInterval(() => {
  const randomIndex = Math.floor(Math.random() * quotes.length);
  quote.textContent = quotes[randomIndex];
}, 3000);

setInterval();