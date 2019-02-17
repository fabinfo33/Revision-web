function Employe() {
    this.nom = "";
    this.branche = "";
}

function Manager() {
    this.rapports = [];
}
Manager.prototype = new Employe();

function Travailleur() {
    this.projets = [];
}
Travailleur.prototype = new Employe();

function Vendeur() {
    this.quota = -1;
    this.branche = "Vente";
}
Vendeur.prototype = new Travailleur();

function Ingenieur() {
    this.domaine = "";
    this.branche = "Ingénierie";
}
Ingenieur.prototype = new Travailleur();