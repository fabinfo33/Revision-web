//Test de variables en Javascript
/*
var unNom = "Fabien";
var unChiffre = 5;
var unTextComplex = "Mon dieu c\'est terrible !";
var unBooleen = true;
var unCalcul = 6 + unChiffre;
*/
/*
//concaténation
var unePhrase = unTextComplex + " " + unNom;
*/
/*
var unNom = prompt('Entrez votre nom :');
var hi = "Bonjour"
alert(hi + ' ' + unNom);
*/

//Convertion String to number
/*
var unNombreString = prompt('Entrez un nombre :');
var unNombreString2 = prompt('Entrez un deuxime nombre :');

var result = parseInt(unNombreString) + parseInt(unNombreString2);

alert(result);
*/

//Convertion number to String
/*
var unNombre = 45;
var deuxNombre = 5;
var unString =  unNombre + '' + deuxNombre;
*/

//Opérateurs de comparaisons
/*
var number1 = 2, number2 = 2, number3 = 4, result;

result = number1 == number2; // On spécifie deux variables avec l'opérateur de comparaison entre elles
alert(result); // Affiche « true », la condition est donc vérifiée car les deux variables contiennent bien la même valeur

result = number1 == number3;
alert(result); // Affiche « false », la condition n'est pas vérifiée car 2 est différent de 4

result = number1 < number3;
alert(result); // Affiche « true », la condition est vérifiée car 2 est bien inférieur à 4
*/
//comparaison de type et contenu
/*
var text = "42", nombre = 42;

alert(text == nombre); //compare que le contenu et convertie
alert(text === nombre); //compare le contenu et le type.
*/
/*
//opérateurs de comparaison et logiques.
var condition1, condition2, result;

condition1 = 2 > 8; // false
condition2 = 8 > 2; // true

result = condition1 && condition2;
alert(result); // Affiche « false »
*/
/*
//Les conditions
var unNom = prompt('Entrez votre nom');

if (unNom == 'Fabien') {
  alert('Bienvenue Admin !');
}
else
{
  alert('Dégage intrus !');
}
*/
/*
//confirm()
if (confirm("Tu veux des bonnes notes ?")) {
  alert('Les voila');
}
else {
  alert('Tanpis');
}
*/
/*
var instrument = prompt("Entrez le nom de votre instrument");

if (instrument == 'Guitare') {
  alert ("Cool un guitariste !");
}
  else if (instrument == 'Piano') {
    alert("A merde pas de piano ici !");
  }
  else {
    alert ("Instrument non reconnu");
  }
*/

//les switch
//Attention un swith verifier le type et le contenu !
// unInsrument = prompt("Entrez le nom de votre instrument");
// switch (unInsrument) {
//   case "Guitare":
//       alert("Cool un guitariste !");
//     break;
//   case "Piano":
//       alert("Merde pas de piano ici !");
//     break;
//   case "Batterie":
//       alert("Avec plasir un batteur !");
//       break;
//   default:
//     alert("Instrument non reconnu");
// }
/*
//Les ternaires
var message1 = "Votre catégorie : ", adult,
adult = confirm("Etes vous majeur ?");
endMessage = adult ? "+18" : "-18";

alert(message1 + endMessage);
*/
/*
//la booleanité des variables
var unString = "Une chaine de caractère";
var unFauxString = "";

if(unString){
  alert("C\'est vrai !");
}
else {
  alert("c\'est faux !");
}
*/

//Le OU et les variables IMPORTANT

var conditionTest1 = '', conditionTest2 = 'Une chaîne de caractères';

alert(conditionTest1 || conditionTest2);
