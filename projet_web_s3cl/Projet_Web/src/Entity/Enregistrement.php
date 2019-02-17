<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enregistrement
 *
 * @ORM\Table(name="Enregistrement")
 * @ORM\Entity(repositoryClass="App\Repository\EnregistrementRepository")
 */
class Enregistrement
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Morceau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeMorceau;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=0, nullable=false)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="Code_Composition", type="integer", nullable=false)
     */
    private $codeComposition;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_de_Fichier", type="string", length=0, nullable=false)
     */
    private $nomDeFichier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Duree", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $duree;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Duree_Seconde", type="integer", nullable=true)
     */
    private $dureeSeconde;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var binary|null
     *
     * @ORM\Column(name="Extrait", type="binary", nullable=true)
     */
    private $extrait;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompositionDisque", mappedBy="enregistrement")
     */
    private $compoDisque;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Achat", mappedBy="enregistrement", cascade={"persist", "remove"})
     */
    private $achat;

//    /**
//     * @ORM\OneToOne(targetEntity="App\Entity\Interpreter", mappedBy="enregistrementInterprete", cascade={"persist", "remove"})
//     */
//    private $interpreter;


    public function __construct()
    {
        $this->compoDisque = new ArrayCollection();
        $this->achats = new ArrayCollection();
    }


    public function getCodeMorceau(): ?int
    {
        return $this->codeMorceau;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getCodeComposition(): ?int
    {
        return $this->codeComposition;
    }

    public function setCodeComposition(int $codeComposition): self
    {
        $this->codeComposition = $codeComposition;

        return $this;
    }

    public function getNomDeFichier(): ?string
    {
        return $this->nomDeFichier;
    }

    public function setNomDeFichier(string $nomDeFichier): self
    {
        $this->nomDeFichier = $nomDeFichier;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDureeSeconde(): ?int
    {
        return $this->dureeSeconde;
    }

    public function setDureeSeconde(?int $dureeSeconde): self
    {
        $this->dureeSeconde = $dureeSeconde;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getExtrait()
    {
        return $this->extrait;
    }

    public function getExtrait64() {
        $str = stream_get_contents($this->extrait);
        return(base64_encode($str));
    }

    public function setExtrait($extrait): self
    {
        $this->extrait = $extrait;

        return $this;
    }

    /**
     * @return Collection|CompositionDisque[]
     */
    public function getCompoDisque(): Collection
    {
        return $this->compoDisque;
    }

    public function addCompoDisque(CompositionDisque $compoDisque): self
    {
        if (!$this->compoDisque->contains($compoDisque)) {
            $this->compoDisque[] = $compoDisque;
            $compoDisque->setEnregistrement($this);
        }

        return $this;
    }

    public function removeCompoDisque(CompositionDisque $compoDisque): self
    {
        if ($this->compoDisque->contains($compoDisque)) {
            $this->compoDisque->removeElement($compoDisque);
            // set the owning side to null (unless already changed)
            if ($compoDisque->getEnregistrement() === $this) {
                $compoDisque->setEnregistrement(null);
            }
        }

        return $this;
    }

    public function getAchat(): ?Achat
    {
        return $this->achat;
    }

    public function setAchat(Achat $achat): self
    {
        $this->achat = $achat;

        // set the owning side of the relation if necessary
        if ($this !== $achat->getEnregistrement()) {
            $achat->setEnregistrement($this);
        }

        return $this;
    }

//    public function getInterpreter(): ?Interpreter
//    {
//        return $this->interpreter;
//    }
//
//    public function setInterpreter(Interpreter $interpreter): self
//    {
//        $this->interpreter = $interpreter;
//
//        // set the owning side of the relation if necessary
//        if ($this !== $interpreter->getEnregistrementInterprete()) {
//            $interpreter->setEnregistrementInterprete($this);
//        }
//
//        return $this;
//    }

}
