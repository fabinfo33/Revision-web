/*

var nicks = '',
    nick,
    proceed = true;

while (proceed) {
    nick = prompt('Entrez un prénom :');

    if (nick) {
        nicks += nick + ' '; // Ajoute le nouveau prénom ainsi qu'une espace juste après
    } else {
        proceed = false; // Aucun prénom n'a été entré, donc on fait en sorte d'invalider la condition
    }
}

alert(nicks); // Affiche les prénoms à la suite
*/
/*
for (var i = 0; i<5; i++) {
  alert("Ceci est la " + i + "ème alerte");
}
*/

for (var i = 0, nicks = '', nick; true; i++) {
    nick = prompt('Entrez un prénom :');

    if (nick) {
        nicks += nick + ' ';
    } else {
        break;
    }
}

alert('Il y a ' + i + ' prénoms :\n\n' + nicks);
