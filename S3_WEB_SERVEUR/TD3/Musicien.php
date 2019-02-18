<?php
class Musicien
{
  private $code_musicien;
  private $nom_musicien;
  private $prénom_musicien;


  public function __construct()
  {

  }

  public function presenterMusicien() {
    if (isset($this->nom_musicien) && isset($this->prénom_musicien)) {
      echo "Code : ". $this->code_musicien . "Nom : " . $this->nom_musicien . " Prénom : " . $this->prénom_musicien . "\n";
    } else {
      echo "Le musicien n'a pas de prénom ni nom";
    }
  }

  public function creerLienMusicien() {
    return "<a href=\"profilMusicien.php?id=". $this->code_musicien . "\"" . ">" . $this->nom_musicien . " " . $this->prénom_musicien . "</a>";
  }
}

  ?>
