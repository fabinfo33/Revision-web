var tabText = [
  document.createTextNode('Langages basés sur ECMAScript :'),
  document.createTextNode('JavaScript'),
  document.createTextNode('JScript'),
  document.createTextNode('ActionScript'),
  document.createTextNode('EX4')
];

var mainDiv = document.createElement('div');
var para = document.createElement('p');
var ul = document.createElement('ul');


mainDiv.id = 'divTP2';

para.appendChild(tabText[0]);

mainDiv.appendChild(para);
mainDiv.appendChild(ul);

for (var i = 1; i < 5; i++) {
  var li = document.createElement('li');
  li.appendChild(tabText[i]);
  mainDiv.appendChild(li);
}





document.body.appendChild(mainDiv);
