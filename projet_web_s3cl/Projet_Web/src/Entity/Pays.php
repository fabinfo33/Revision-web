<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="Pays", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Pays", columns={"Nom_Pays"})})
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Pays", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codePays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_Pays", type="string", length=50, nullable=true)
     */
    private $nomPays;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Musicien", mappedBy="pays")
     */
    private $musiciens;

    public function __construct()
    {
        $this->musiciens = new ArrayCollection();
    }

    public function getCodePays(): ?int
    {
        return $this->codePays;
    }

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(?string $nomPays): self
    {
        $this->nomPays = $nomPays;

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
            $musicien->setPays($this);
        }

        return $this;
    }

    public function removeMusicien(Musicien $musicien): self
    {
        if ($this->musiciens->contains($musicien)) {
            $this->musiciens->removeElement($musicien);
            // set the owning side to null (unless already changed)
            if ($musicien->getPays() === $this) {
                $musicien->setPays(null);
            }
        }

        return $this;
    }


}
