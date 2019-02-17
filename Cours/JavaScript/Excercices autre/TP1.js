//Lien OpenClassrooms https://openclassrooms.com/courses/dynamisez-vos-sites-web-avec-javascript/tp-convertir-un-nombre-en-toutes-lettres-1

var unChiffre = parseInt(prompt("Entrez un nombre entre 0 et 999"),10);
if (isNaN(unChiffre) == false && unChiffre > 0 && unChiffre < 999) {
  convChiffresEnLettre(unChiffre);
}
else if (isNaN(unchiffre) == false && unChiffre == 0) {
  alert('zéro');
}
else {
  alert("Veuillez entrez un nombre correct");
}


/*
Convertie un nombre en lettres
*/
function convChiffresEnLettre(unNombre) {
  //Trouver dizaines , centaines et unité
  var unite = unNombre%10;
  var dizaine = (unNombre%100 - unite) /10;
  var centaine = (unNombre%1000 -unNombre%100) /100;

  var tabUniteEnLettre = ["","un","deux","trois", "quatre","cinq", "six", "sept", "huit", "neuf"];
  var tabDizaineEnLettre = ["","dix", "vingt", "trente", "quarente", "cinquente", "soixante", "soixante-dix", "quatre-vingt", "quatre-vingt-dix"];
  var tabCentaineEnLettre = ["","cent", "deux-cent", "trois_cent", "quatre-cent", "cinq-cent", "six-cent", "sept-cent", "huit-cent", "neuf-cent"];

  uniteEnLettre = tabUniteEnLettre[unite];
  dizaineEnLettre = tabDizaineEnLettre[dizaine];
  centaineEnLettre = tabCentaineEnLettre[centaine];
  return alert(centaineEnLettre + '-' + dizaineEnLettre + '-' + uniteEnLettre);
}

/* CORRECTION
function num2Letters(number) {

    if (isNaN(number) || number < 0 || 999 < number) {
        return 'Veuillez entrer un nombre entier compris entre 0 et 999.';
    }

    var units2Letters = ['', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf'],
        tens2Letters = ['', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante', 'quatre-vingt', 'quatre-vingt'];

    var units = number % 10,
        tens = (number % 100 - units) / 10,
        hundreds = (number % 1000 - number % 100) / 100;

    var unitsOut, tensOut, hundredsOut;


    if (number === 0) {

        return 'zéro';

    } else {

        // Traitement des unités

        unitsOut = (units === 1 && tens > 0 && tens !== 8 ? 'et-' : '') + units2Letters[units];

        // Traitement des dizaines

        if (tens === 1 && units > 0) {

            tensOut = units2Letters[10 + units];
            unitsOut = '';

        } else if (tens === 7 || tens === 9) {

            tensOut = tens2Letters[tens] + '-' + (tens === 7 && units === 1 ? 'et-' : '') + units2Letters[10 + units];
            unitsOut = '';

        } else {

            tensOut = tens2Letters[tens];

        }

        tensOut += (units === 0 && tens === 8 ? 's' : '');

        // Traitement des centaines

        hundredsOut = (hundreds > 1 ? units2Letters[hundreds] + '-' : '') + (hundreds > 0 ? 'cent' : '') + (hundreds > 1 && tens == 0 && units == 0 ? 's' : '');

        // Retour du total

        return hundredsOut + (hundredsOut && tensOut ? '-' : '') + tensOut + (hundredsOut && unitsOut || tensOut && unitsOut ? '-' : '') + unitsOut;
    }

}



var userEntry;

while (userEntry = prompt('Indiquez le nombre à écrire en toutes lettres (entre 0 et 999) :')) {

    alert(num2Letters(parseInt(userEntry, 10)));

}

*/
