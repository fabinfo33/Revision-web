<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="Composer", indexes={@ORM\Index(name="IDX_6105648EE694D5AB", columns={"Code_Musicien"}), @ORM\Index(name="IDX_6105648ECB48FCBD", columns={"Code_Oeuvre"})})
 * @ORM\Entity
 */
class Composer
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Composer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeComposer;

    /**
     * @var \Musicien
     *
     * @ORM\ManyToOne(targetEntity="Musicien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Musicien", referencedColumnName="Code_Musicien")
     * })
     */
    private $codeMusicien;

    /**
     * @var \Oeuvre
     *
     * @ORM\ManyToOne(targetEntity="Oeuvre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Oeuvre", referencedColumnName="Code_Oeuvre")
     * })
     */
    private $codeOeuvre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Musicien", inversedBy="composer")
     * @ORM\JoinColumn(name="Code_Musicien", referencedColumnName="Code_Musicien", nullable=false)
     */
    private $musicien;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Oeuvre", inversedBy="composer")
     * @ORM\JoinColumn(name="Code_Oeuvre", referencedColumnName="Code_Oeuvre", nullable=false)
     */
    private $oeuvre;

    public function getCodeComposer(): ?int
    {
        return $this->codeComposer;
    }

    public function getCodeMusicien(): ?Musicien
    {
        return $this->codeMusicien;
    }

    public function setCodeMusicien(?Musicien $codeMusicien): self
    {
        $this->codeMusicien = $codeMusicien;

        return $this;
    }

    public function getCodeOeuvre(): ?Oeuvre
    {
        return $this->codeOeuvre;
    }

    public function setCodeOeuvre(?Oeuvre $codeOeuvre): self
    {
        $this->codeOeuvre = $codeOeuvre;

        return $this;
    }

    public function getMusicien(): ?Musicien
    {
        return $this->musicien;
    }

    public function setMusicien(?Musicien $musicien): self
    {
        $this->musicien = $musicien;

        return $this;
    }

    public function getOeuvre(): ?Oeuvre
    {
        return $this->oeuvre;
    }

    public function setOeuvre(?Oeuvre $oeuvre): self
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }


}
