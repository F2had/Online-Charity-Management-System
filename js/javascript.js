var gQuote = [
{ code: 1, quote: "\“There is no exercise better for the heart than reaching down and lifting people up.\”"},
{ code: 2, quote: "\“It's not how much we give but how much love we put into giving.\”"},
{ code: 3, quote: "\“When we give cheerfully and accept gratefully, everyone is blessed.\”"},
{ code: 4, quote: "\“A kind gesture can reach a wound that only compassion can heal.\”"},
{ code: 4, quote: "\“Every sunrise is an invitation for us to arise and brighten someone's day.\”"},

];

document.querySelector("#quoteMain").addEventListener("click", function() {
	var x = Math.floor((Math.random() * gQuote.length));
	document.querySelector("#quote").innerText = gQuote[x].quote;

});