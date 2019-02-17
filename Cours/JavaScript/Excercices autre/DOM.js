var query = document.querySelector('#menu p a');
var link = query.getAttribute("href");
alert(link);

query.setAttribute('href', 'www.google.fr');
