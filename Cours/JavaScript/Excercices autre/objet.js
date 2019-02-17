//Les objets
/*
var unString = "Une chaine de char";

//Propiété des objets
alert(unString.length);
//Methode d'un objet
alert(unString.toUpperCase());
*/
//les tableaux
/*
var monTab = ["Fabien", "Romain", "Charlotte"];
monTab.push("Axelle"); //ajoute un  string à la fin du tableau
alert(monTab);

*/
/*
var monString = ("Fabien Charlotte Romain Axelle")
var monTab = monString.split(' '); //crée un tab avec un string
//l'inverse est join()
alert(monString);
alert(monTab);
*/

//Les objets littéraux !
/*
var monObjet = {
  guitariste : "Fabien",
  batteur: "Romain",
  pianiste: "Charlotte"
};
//ne pas confondre avec var monTab = [...] !
alert(monObjet.guitariste); //propriété de l'objet

//ajout d'un bassiste
monObjet.bassiste = "Rico";

alert(monObjet.bassiste);
*/
//le for in
var monObjet = {
  guitariste : "Fabien",
  batteur: "Romain",
  pianiste: "Charlotte"
};

for (var id in monObjet) {
  alert(id.toUpperCase() + ':' + ' ' + monObjet[id]);
}
