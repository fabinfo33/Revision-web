<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="Genre")
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Genre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeGenre;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle_Abrege", type="string", length=60, nullable=false)
     */
    private $libelleAbrege;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Album", mappedBy="genre")
     */
    private $album;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Musicien", mappedBy="genre")
     */
    private $musiciens;

    public function __construct()
    {
        $this->album = new ArrayCollection();
        $this->musiciens = new ArrayCollection();
    }



    public function getCodeGenre(): ?int
    {
        return $this->codeGenre;
    }

    public function getLibelleAbrege(): ?string
    {
        return $this->libelleAbrege;
    }

    public function setLibelleAbrege(string $libelleAbrege): self
    {
        $this->libelleAbrege = $libelleAbrege;

        return $this;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbum(): Collection
    {
        return $this->album;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->album->contains($album)) {
            $this->album[] = $album;
            $album->setGenre($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->album->contains($album)) {
            $this->album->removeElement($album);
            // set the owning side to null (unless already changed)
            if ($album->getGenre() === $this) {
                $album->setGenre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Musicien[]
     */
    public function getMusiciens(): Collection
    {
        return $this->musiciens;
    }

    public function addMusicien(Musicien $musicien): self
    {
        if (!$this->musiciens->contains($musicien)) {
            $this->musiciens[] = $musicien;
            $musicien->setGenre($this);
        }

        return $this;
    }

    public function removeMusicien(Musicien $musicien): self
    {
        if ($this->musiciens->contains($musicien)) {
            $this->musiciens->removeElement($musicien);
            // set the owning side to null (unless already changed)
            if ($musicien->getGenre() === $this) {
                $musicien->setGenre(null);
            }
        }

        return $this;
    }

}
