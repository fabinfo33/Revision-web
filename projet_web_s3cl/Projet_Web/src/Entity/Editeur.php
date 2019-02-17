<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Editeur
 *
 * @ORM\Table(name="Editeur", indexes={@ORM\Index(name="IDX_CA1A7E7320B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Editeur
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Editeur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeEditeur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Editeur", type="string", length=50, nullable=false)
     */
    private $nomEditeur;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Album", mappedBy="editeur")
     */
    private $albums;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
    }

    public function getCodeEditeur(): ?int
    {
        return $this->codeEditeur;
    }

    public function getNomEditeur(): ?string
    {
        return $this->nomEditeur;
    }

    public function setNomEditeur(string $nomEditeur): self
    {
        $this->nomEditeur = $nomEditeur;

        return $this;
    }

    public function getCodePays(): ?Pays
    {
        return $this->codePays;
    }

    public function setCodePays(?Pays $codePays): self
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->albums->contains($album)) {
            $this->albums[] = $album;
            $album->setEditeur($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->albums->contains($album)) {
            $this->albums->removeElement($album);
            // set the owning side to null (unless already changed)
            if ($album->getEditeur() === $this) {
                $album->setEditeur(null);
            }
        }

        return $this;
    }


}
