var newDiv = document.createElement('div');
var newText = document.createTextNode('Le ');
var newStrong = document.createElement('strong');
var newStrongText = document.createTextNode('World Wide Web Consortium');
var newText2 = document.createTextNode(', abrégé par le sigle ');
var newStrong2 = document.createElement('strong');
var newStrongText2 = document.createTextNode('W3C');
var newText3 = document.createTextNode(', est un ');
var newA = document.createElement('a');
var newAtext = document.createTextNode('organisme de standarisation ');
var newText4 = document.createTextNode('à but non-lucratif chargé de promouvoir la compatibilité des technologies du ');
var newA2 = document.createElement('a');
var newAtext2 = document.createTextNode('World Wide Web');

newDiv.id = 'divTP1';
newA.href = 'http://fr.wikipedia.org/wiki/Organisme_de_normalisation';
newA.title = 'Organisme de normalisation';
newA2.href = 'http://fr.wikipedia.org/wiki/World_Wide_Web';
newA2.title = 'World Wide Web';

newDiv.appendChild(newText);
newStrong.appendChild(newStrongText);
newStrong2.appendChild(newStrongText2);
newA.appendChild(newAtext);
newA2.appendChild(newAtext2);


document.querySelector('body').appendChild(newDiv);
newDiv.appendChild(newStrong);
newDiv.appendChild(newText2);
newDiv.appendChild(newStrong2);
newDiv.appendChild(newText3);
newDiv.appendChild(newA);
newDiv.appendChild(newText4);
newDiv.appendChild(newA2);
