/**
 * @author Fabien
 */

var inputs = document.querySelectorAll("#myForm input");

/**
 * Permet de récupérer un tooltip à partir d'un élément.
 * @return l'élément contenant le tooltip;
 */
function getTooltip(elements) {
  while (elements = elements.nextSibling) {
    if (elements.className === 'tooltip') {
      return elements;
    }
  }
  return false;
}

/**
 * enlève tous les tooltips de la page
 */
function removeTooltips() {
  var tooltips = document.querySelectorAll('.tooltip');
  for (var i=0; i<tooltips.length; i++) {
    tooltips[i].style.display = 'none';
  }
}

/**
 * Verifie si l'utilisateur a rentré un sexe
 * @return {bool} vrai si c'est bon
 */
function checkSexSelection() {
  var sexeInputs = document.querySelectorAll("#myForm input[name=sex]");
  var checked = false;
  var tooltip = getTooltip(sexeInputs[0].parentNode).style;
  for (var i=0; i<sexeInputs.length; i++) {
    if(sexeInputs[i].checked) {
      checked = true;
      tooltip.display = 'none';
    }
  }
  if (!checked) {
    tooltip.display = 'inline-block';
  }
  return checked;
}

function checkLastname() {
  var isfilled = false;
  var lNameInput = document.getElementById('lastName');
  var tooltip = getTooltip(lNameInput).style;

  if (lNameInput.value.length >= 2) {
    isfilled = true;
    tooltip.display = 'none';
  } else {
    tooltip.display = 'inline-block';
  }
  return isfilled;
}

function checkFirstname() {
  var isfilled = false;
  var fNameInput = document.getElementById('firstName');
  var tooltip = getTooltip(fNameInput).style;

  if (fNameInput.value.length >= 2) {
    isfilled = true;
    tooltip.display = 'none';

  } else {
    tooltip.display = 'inline-block';
  }
  return isfilled;
}

function checkAge() {
  var isCorrect = false;
  var age = document.getElementById('age');
  var ageNum = parseInt(age.value);
  var tooltip = getTooltip(age).style;

  if(!isNaN(ageNum) && ageNum>=5 && ageNum <= 120) {
    isCorrect = true;
    tooltip.display = 'none';
  } else {
    tooltip.display = 'inline-block';
  }
  return isCorrect;
}

function checkPseudo() {
  var isCorrect = false;
  var pseudoInput = document.getElementById('login');
  var tooltip = getTooltip(pseudoInput).style;

  if (pseudoInput.value.length >= 6) {
    isCorrect = true;
    tooltip.display = 'none';
  } else {
    tooltip.display = 'inline-block';
  }
  return isCorrect;
}

function checkPassword() {
  var isCorrect = false;
  var inputpw1 = document.getElementById('pwd1');
  var inputpw2 = document.getElementById('pwd2');
  var tooltip = getTooltip(inputpw1).style;
  var tooltip2 = getTooltip(inputpw2).style;

  //verifier longueur
  if (inputpw1.value.length >= 6) {
    tooltip.display = 'none';
    //test si ils sont identiques
    if (inputpw1.value == inputpw2.value) {
      isCorrect = true;
    } else {
      tooltip2.display = 'inline-block';
    }
  } else {
    tooltip.display = 'inline-block';
  }
  return isCorrect;
}

function checkCountry() {
  var isCorrect = false;
  var selection = document.getElementById('country');
  var tooltip = getTooltip(selection).style;
  if (selection.options[selection.selectedIndex].value != 'none') {
    isCorrect = true;
    tooltip.display = 'none';
  } else {
    tooltip.display = 'inline-block';
  }
  return isCorrect;
}

function checkOnSubmit() {
  var allGood = false; //a utiliser
  var submit = document.querySelector("#myForm input[type=submit]");
  submit.addEventListener('click', function(e) {
    if (checkAge() && checkPseudo() && checkCountry() && checkLastname()
    && checkPassword() && checkFirstname() && checkSexSelection()) {
      e.submit();
    } else {
      checkAllInputs(); //affiche les toolstips concernés
      e.preventDefault();
      alert('mauvais remplissage');
    }
  });
}

function checkAllInputs() {
  checkSexSelection();
  checkLastname();
  checkFirstname();
  checkAge();
  checkPseudo()
  checkPassword();
  checkCountry();
}

removeTooltips();
checkOnSubmit();
