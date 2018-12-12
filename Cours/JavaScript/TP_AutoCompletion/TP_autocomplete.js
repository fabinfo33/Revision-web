var recherche = document.getElementsByName("recherche")[0];
var resultats = document.getElementById("resultats");

var form = document.getElementById('myForm');
form.addEventListener('submit', function(e){
    //  loadData();
    e.preventDefault();
});

form.addEventListener('keyup', function(e){
    clearResultats();
    loadData();
    if(e.key === 'arrowDown') {
      resultats.firstElementChild.classList.add("resultat-active");
    }
}, false);

resultats.addEventListener('click', function (e) {
  if (e.relatedTarget.Node)
    var resText = e.target.valueOf().innerText;
    recherche.value = resText;
})

// form.addEventListener('keyup', function (e) {
//     if (e.key === 'ArrowDown') {
//         recherche.blur();
//         resultats.firstElementChild.classList.add('resultat-active') }
// });

/**
 * Recupere les donnees des villes et les affichent
 * @return void
 */
function loadData() {
    var xhr = new XMLHttpRequest();
    //recherche = encodeURIComponent(recherche);
    console.log("Val de recherche : " + recherche.value);
    xhr.open('GET', 'autocomplete.php?recherche=' + recherche.value);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(null);

    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState ===  XMLHttpRequest.DONE && xhr.status === 200 ) {
            console.log(xhr.responseText);
            var villes = xhr.responseText.split('|');
            for (var i = 0; i < villes.length -1; i++) {
                console.log(villes[i]);
                var divVille = document.createElement('div');
                divVille.classList.add("resultat");
                var divContent = document.createTextNode(villes[i]);
                divVille.appendChild(divContent);
                resultats.appendChild(divVille);
            }
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200) {
            console.log('ERREUR');
        } else {
            console.log("AUTRE ERREUR");
        }
    });
}
/**
 * Efface les resultats
 * @return void
 */
function clearResultats() {
    while(resultats.hasChildNodes()) {
        resultats.firstChild.remove();
    }
}
