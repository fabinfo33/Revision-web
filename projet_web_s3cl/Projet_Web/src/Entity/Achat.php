<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="Achat", indexes={@ORM\Index(name="IDX_E768AB52A1866919", columns={"Code_Enregistrement"}), @ORM\Index(name="IDX_E768AB52888459B3", columns={"Code_Abonne"})})
 * @ORM\Entity(repositoryClass="App\Repository\AchatRepository")
 */
class Achat
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Achat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAchat;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="Achat_Confirme", type="boolean", nullable=true)
     */
    private $achatConfirme;

    /**
     * @var \Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Enregistrement", referencedColumnName="Code_Morceau")
     * })
     */
    private $codeEnregistrement;

    /**
     * @var \Abonne
     *
     * @ORM\ManyToOne(targetEntity="Abonne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Abonne", referencedColumnName="Code_Abonne")
     * })
     */
    private $codeAbonne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Abonne", inversedBy="achats")
     * @ORM\JoinColumn(name="Code_Abonne", referencedColumnName="Code_Abonne")
     */
    private $abonne;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enregistrement", inversedBy="achat", cascade={"persist"})
     * @ORM\JoinColumn(name="Code_Enregistrement", referencedColumnName="Code_Morceau", nullable=false)
     */
    private $enregistrement;


    public function getCodeAchat(): ?int
    {
        return $this->codeAchat;
    }

    public function getAchatConfirme(): ?bool
    {
        return $this->achatConfirme;
    }

    public function setAchatConfirme(?bool $achatConfirme): self
    {
        $this->achatConfirme = $achatConfirme;

        return $this;
    }

    public function getCodeEnregistrement(): ?Enregistrement
    {
        return $this->codeEnregistrement;
    }

    public function setCodeEnregistrement(?Enregistrement $codeEnregistrement): self
    {
        $this->codeEnregistrement = $codeEnregistrement;

        return $this;
    }

    public function getCodeAbonne(): ?Abonne
    {
        return $this->codeAbonne;
    }

    public function setCodeAbonne(?Abonne $codeAbonne): self
    {
        $this->codeAbonne = $codeAbonne;

        return $this;
    }

    public function getAbonne(): ?Abonne
    {
        return $this->abonne;
    }

    public function setAbonne(?Abonne $abonne): self
    {
        $this->abonne = $abonne;

        return $this;
    }

    public function getEnregistrement(): ?Enregistrement
    {
        return $this->enregistrement;
    }

    public function setEnregistrement(Enregistrement $enregistrement): self
    {
        $this->enregistrement = $enregistrement;

        return $this;
    }




}
