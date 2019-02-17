var mainDiv = document.createElement('div');
var form = document.createElement('form');
var fieldset = document.createElement('fieldset');
var legend = document.createElement('legend');
var legendText = document.createTextNode('Uploader une image');
var div = document.createElement('div');
var label = document.createElement('label');
var labelText = document.createTextNode('Image à uploader');
var inputfile = document.createElement('input');
var br = document.createElement('br');
var br2 = br.cloneNode(false);
var inputsubmit = document.createElement('input');

//attribution des propriété
mainDiv.id = 'divTP4';
form.setAttribute('enctype', 'multipart/form-data');
form.method = 'post';
form.action = 'upload.php';
div.setAttribute('style', 'text-align: center');
label.for = 'inputUpload';
inputfile.type = 'file';
inputfile.name = 'inputUpload';
inputfile.id = 'inputUpload';
inputsubmit.type = 'submit';
inputsubmit.value = 'Envoyer';

//Ajout des enfants text
legend.appendChild(legendText);
label.appendChild(labelText);

//Ajout au document des éléments
mainDiv.appendChild(form);
form.appendChild(fieldset);
fieldset.appendChild(legend);
fieldset.appendChild(div);
div.appendChild(label);
div.appendChild(inputfile);
div.appendChild(br);
div.appendChild(br2);
div.appendChild(inputsubmit);


document.body.appendChild(mainDiv);
