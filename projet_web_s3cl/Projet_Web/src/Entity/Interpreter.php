<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interpreter
 *
 * @ORM\Table(name="Interpreter", indexes={@ORM\Index(name="IDX_36AEA960D990D4F0", columns={"Code_Morceau"}), @ORM\Index(name="IDX_36AEA960E694D5AB", columns={"Code_Musicien"}), @ORM\Index(name="IDX_36AEA960D389A975", columns={"Code_Instrument"})})
 * @ORM\Entity
 */
class Interpreter
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Interpreter", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeInterpreter;

    /**
     * @var \Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Morceau", referencedColumnName="Code_Morceau")
     * })
     */
    private $codeMorceau;

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
     * @var \Instrument
     *
     * @ORM\ManyToOne(targetEntity="Instrument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Instrument", referencedColumnName="Code_Instrument")
     * })
     */
    private $codeInstrument;

//    /**
//     * @ORM\OneToOne(targetEntity="App\Entity\Musicien", inversedBy="interpreter", cascade={"persist", "remove"})
//     * @ORM\JoinColumn(name="Code_Musicien", referencedColumnName="Code_Musicien", nullable=false)
//     */
//    private $musicien;
//
//    /**
//     * @ORM\OneToOne(targetEntity="App\Entity\Enregistrement", inversedBy="interpreter", cascade={"persist", "remove"})
//     * @ORM\JoinColumn(name="Code_Morceau", referencedColumnName="Code_Morceau", nullable=false)
//     */
//    private $enregistrementInterprete;

    public function getCodeInterpreter(): ?int
    {
        return $this->codeInterpreter;
    }

    public function getCodeMorceau(): ?Enregistrement
    {
        return $this->codeMorceau;
    }

    public function setCodeMorceau(?Enregistrement $codeMorceau): self
    {
        $this->codeMorceau = $codeMorceau;

        return $this;
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

    public function getCodeInstrument(): ?Instrument
    {
        return $this->codeInstrument;
    }

    public function setCodeInstrument(?Instrument $codeInstrument): self
    {
        $this->codeInstrument = $codeInstrument;

        return $this;
    }

//    public function getMusicien(): ?Musicien
//    {
//        return $this->musicien;
//    }
//
//    public function setMusicien(Musicien $musicien): self
//    {
//        $this->musicien = $musicien;
//
//        return $this;
//    }
//
//    public function getEnregistrementInterprete(): ?Enregistrement
//    {
//        return $this->enregistrementInterprete;
//    }
//
//    public function setEnregistrementInterprete(Enregistrement $enregistrementInterprete): self
//    {
//        $this->enregistrementInterprete = $enregistrementInterprete;
//
//        return $this;
//    }


}
