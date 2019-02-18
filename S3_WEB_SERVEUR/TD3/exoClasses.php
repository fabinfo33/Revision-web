<?php

/**
 *
 */
class Membre
{
  private $id_membre;
  private $nom_membre;
  private $prenom_membre;
  private $fonction_membre;

  // public function __construct($id, $nom, $prenom, $fonction)
  // {
  //   $this->_id_membre = setIdMembre($id);
  //   $this->_nom_membre = setNomMembre($nom);
  //   $this->_prenom_membre = setPrenomMembre($prenom);
  //   $this->_fonction_membre = setFonctionMembre($fonction);
  // }

  public function __construct()
  {
     // $this->_nom_membre = "Default";
     // $this->_prenom_membre = "Default";
  }

  public function presenterMembre() {
    if (isset($this->nom_membre) && isset($this->prenom_membre)) {
      echo "Nom : " . $this->nom_membre . " Prénom : " . $this->prenom_membre . "\n";
    } else {
      echo "Le membre n'a pas de prénom ni nom";
    }
  }

  /*
  GETTERS
   */

  public function getIdMembre() {
    return $this->id_membre;
  }
  public function getNomMembre() {
    return $this->nom_membre;
  }
  public function getPrenomMembre()
  {
    return $this->prenom_membre;
  }
  public function getFonctionMembre()
  {
    return $this->fonction_membre;
  }

  /*
  SETTERS
   */

  public function setIdMembre($id) {
    $id = (int) $id;
    if ($id > 0) {
      $this->id_membre = $id;
    }
  }

  public function setNomMembre($nom)
  {
    if (is_string($nom)) {
      $this->nom_membre = $nom;
    }
  }

  public function setPrenomMembre($prenom)
  {
    if (is_string($prenom)) {
      $this->prenom_membre = $prenom;
    }
  }
  public function setFonctionMembre($fonction)
  {
    if (is_string($fonction)) {
      $this->fonction_membre = $fonction;
    }
  }

}

/*
TEST DE FETCH
 */

$dbh = new PDO('mysql:host=localhost;dbname=groupe', 'root', '');

 $sth = $dbh->query("SELECT id_membre, nom_membre, prenom_membre, fonction_membre FROM Membres");
 $sth->setFetchMode(PDO::FETCH_CLASS, 'Membre');
 $results = $sth->fetchAll();
 // var_dump($results);
 echo "<ul>";
 foreach ($results as $member) {
   echo "<li>";
   $
   $member->presenterMembre();
   echo "</li>";
 }
 echo "</ul>";
// while ($membre = $sth->fetch()) {
//   echo "Id :". $membre['id_membre']. " Nom : " . $membre['nom_membre'] . "\r\n"; //on obtient bien des données
// }
 ?>
