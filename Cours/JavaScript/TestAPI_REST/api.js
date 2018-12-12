var apiResquest = "https://en.wikipedia.org/api/rest_v1/page/summary/google";
var contentDiv = document.getElementById('content');

var rechercheForm = document.getElementById('recherche');
var rechercheInput = document.getElementById('rechercheInput');
var recherche = "";
var recherchePageInput = document.getElementById('pageInput');
var recherchePageForm = document.getElementById('pageForm');

function startQuery() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "https://en.wikipedia.org/api/rest_v1/page/summary/" + recherche);

    xhr.addEventListener('readystatechange' ,function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
            var responseJson = JSON.parse(xhr.responseText);
            treatData(responseJson);
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 404) {
            contentDiv.innerText = "Aucun résulat";
        } else {
            console.log("Erreur");
        }
    });
    xhr.send(null);
}

function startQueryPage(page) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "https://en.wikipedia.org/api/rest_v1/page/html/" + page);
    var pageContentDiv = document.getElementById('pageContent');

    xhr.addEventListener('readystatechange', function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
            pageContentDiv.innerHTML = xhr.responseText;
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 404) {
            pageContentDiv.innerText = "Aucun Résultat";
        }
        else {
            console.log('error');
        }
    });

    xhr.send(null);
}

rechercheForm.addEventListener('submit', function (e) {
    e.preventDefault();
});

rechercheInput.addEventListener("keyup", function (e) {
    if(e.key === "Enter") {
        recherche = rechercheInput.value;
        startQuery();
    }
});

recherchePageForm.addEventListener('submit', function (e) {
    e.preventDefault();
});

recherchePageInput.addEventListener('keyup', function (e) {
    if(e.key === 'Enter') {
        var page = recherchePageInput.value;
        startQueryPage(page);
    }
});


function treatData(json) {
    console.log(json.extract_html);
    contentDiv.innerHTML = json.extract_html;
}

function clearContent() {
    contentDiv.innerHTML = '';
}