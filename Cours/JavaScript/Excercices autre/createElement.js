// var paragraph = document.getElementById('myP');
// var newLink = document.createElement('a');
// newLink.id = 'myA';
// newLink.href='http://www.google.fr';
// newLink.title = 'Google';
// paragraph.appendChild(newLink);
//
// var textA = document.createTextNode('Google');
// newLink.appendChild(textA);

var newLink = document.createElement('a');
var newLinkText = document.createTextNode("Le Site du Zéro");

newLink.id = 'sdz_link';
newLink.href = 'http://www.siteduzero.com';
newLink.title = 'Découvrez le Site du Zéro !';
newLink.setAttribute('tabindex', '10');

newLink.appendChild(newLinkText);

document.getElementById('myP').appendChild(newLink);
