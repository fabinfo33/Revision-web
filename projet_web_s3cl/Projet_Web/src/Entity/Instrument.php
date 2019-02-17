<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Instrument
 *
 * @ORM\Table(name="Instrument", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Instrument", columns={"Nom_Instrument"})})
 * @ORM\Entity(repositoryClass="App\Repository\InstrumentRepository")
 */
class Instrument
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Instrument", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeInstrument;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Instrument", type="string", length=50, nullable=false)
     */
    private $nomInstrument;

    /**
     * @var binary|null
     *
     * @ORM\Column(name="Image", type="binary", nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Musicien", mappedBy="instrument")
     */
    private $musiciens;

    public function __construct()
    {
        $this->musiciens = new ArrayCollection();
    }

    public function getCodeInstrument(): ?int
    {
        return $this->codeInstrument;
    }

    public function getNomInstrument(): ?string
    {
        return $this->nomInstrument;
    }

    public function setNomInstrument(string $nomInstrument): self
    {
        $this->nomInstrument = $nomInstrument;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

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
            $musicien->setInstrument($this);
        }

        return $this;
    }

    public function removeMusicien(Musicien $musicien): self
    {
        if ($this->musiciens->contains($musicien)) {
            $this->musiciens->removeElement($musicien);
            // set the owning side to null (unless already changed)
            if ($musicien->getInstrument() === $this) {
                $musicien->setInstrument(null);
            }
        }

        return $this;
    }


}
