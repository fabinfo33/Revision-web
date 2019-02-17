var mainDiv = document.createElement('div');
var para = document.createElement('p');
var paraTxt = document.createTextNode('Langages basés sur ECMAScript :');

var languages = [{
  t: 'JavaScript',
  d: 'JavaScript est un langage de programmation de scripts principalement utilisé dans les pages web interactives mais aussi coté serveur.'
},
  { t: 'JScript',
    d: 'JScript est le nom générique de plusieurs implémentations d\'ECMAScript 3 créées par Microsoft.'
  },
  { t: 'ActionScript',
    d: 'ActionScript est le langage de programmation utilisé au sein d\'applications clientes (Adobe Flash, Adobe Flex) et serveur (Flash media server, JRun, Macromedia Generator).'
  },
  {  t: 'EX4',
     d: 'ECMAScript for XML (E4X) est une extension XML au langage ECMAScript.'
  }
];

var dl = document.createElement('dl');

for (var i = 0; i<languages.length; i++) {
  var dt = document.createElement('dt');
  var dd = document.createElement('dd');
  dt.appendChild(document.createTextNode(languages[i].t));
  dd.appendChild(document.createTextNode(languages[i].d));

  dl.appendChild(dt);
  dl.appendChild(dd);

}

mainDiv.id = 'divTP3';
para.appendChild(paraTxt);
mainDiv.appendChild(para);
mainDiv.appendChild(dl);
document.body.appendChild(mainDiv);
