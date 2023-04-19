const quotes = [
    "The only place where success \ncomes before work is in the dictionary. - Vidal Sassoon",
    "There are no shortcuts to any place worth going. - Beverly Sills",
    "Success is not final; failure is not fatal: It is the courage to continue that counts. - Winston Churchill",
    "The only way to do great work is to love what you do. - Steve Jobs",
    "I'm a great believer in luck, and I find the harder I work, the more I have of it. - Thomas Jefferson",
    "Success is no accident. It is hard work, perseverance, learning, studying, sacrifice, and most of all, love of what you are doing or learning to do. - Pele",
    "The only limit to our realization of tomorrow will be our doubts of today. - Franklin D. Roosevelt",
    "Genius is 1% inspiration and 99% perspiration. - Thomas Edison",
    "The difference between try and triumph is just a little umph! - Marvin Phillips",
    "Don't watch the clock; do what it does. Keep going. - Sam Levenson"
  ];
  
  const quoteElement = document.getElementById("self-writing-paragraph");
  let quoteIndex = 0;
  
  function loopQuotes() {
    quoteElement.textContent = quotes[quoteIndex];
    quoteIndex = (quoteIndex + 1) % quotes.length;
    setTimeout(deleteQuote, 10000);
  }
  
  function deleteQuote() {
    quoteElement.textContent = "";
    setTimeout(loopQuotes, 1000);
  }
  
  loopQuotes();
  



 