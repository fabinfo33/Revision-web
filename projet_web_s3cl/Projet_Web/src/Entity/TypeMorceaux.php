<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMorceaux
 *
 * @ORM\Table(name="Type_Morceaux")
 * @ORM\Entity(repositoryClass="App\Repository\TypeMorceauxRepository")
 */
class TypeMorceaux
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeType;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle_Type", type="string", length=20, nullable=false, options={"fixed"=true})
     */
    private $libelleType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=0, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oeuvre", mappedBy="typeMorceaux")
     */
    private $Oeuvres;

    public function __construct()
    {
        $this->Oeuvres = new ArrayCollection();
    }

    public function getCodeType(): ?int
    {
        return $this->codeType;
    }

    public function getLibelleType(): ?string
    {
        return $this->libelleType;
    }

    public function setLibelleType(string $libelleType): self
    {
        $this->libelleType = $libelleType;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Oeuvre[]
     */
    public function getOeuvres(): Collection
    {
        return $this->Oeuvres;
    }

    public function addOeuvre(Oeuvre $oeuvre): self
    {
        if (!$this->Oeuvres->contains($oeuvre)) {
            $this->Oeuvres[] = $oeuvre;
            $oeuvre->setTypeMorceaux($this);
        }

        return $this;
    }

    public function removeOeuvre(Oeuvre $oeuvre): self
    {
        if ($this->Oeuvres->contains($oeuvre)) {
            $this->Oeuvres->removeElement($oeuvre);
            // set the owning side to null (unless already changed)
            if ($oeuvre->getTypeMorceaux() === $this) {
                $oeuvre->setTypeMorceaux(null);
            }
        }

        return $this;
    }


}
