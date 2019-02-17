<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Disque
 *
 * @ORM\Table(name="Disque", indexes={@ORM\Index(name="IDX_F200E9945B515BDB", columns={"Code_Album"})})
 * @ORM\Entity(repositoryClass="App\Repository\DisqueRepository")
 */
class Disque
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Disque", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeDisque;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference_Album", type="string", length=200, nullable=false)
     */
    private $referenceAlbum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Reference_Disque", type="string", length=50, nullable=true)
     */
    private $referenceDisque;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Album", referencedColumnName="Code_Album")
     * })
     */
    private $codeAlbum;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompositionDisque", mappedBy="disque")
     */
    private $compoDisque;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="disques")
     * @ORM\JoinColumn(name="Code_Album", referencedColumnName="Code_Album", nullable=false)
     */
    private $album;

    public function __construct()
    {
        $this->compoDisque = new ArrayCollection();
    }


    public function getCodeDisque(): ?int
    {
        return $this->codeDisque;
    }

    public function getReferenceAlbum(): ?string
    {
        return $this->referenceAlbum;
    }

    public function setReferenceAlbum(string $referenceAlbum): self
    {
        $this->referenceAlbum = $referenceAlbum;

        return $this;
    }

    public function getReferenceDisque(): ?string
    {
        return $this->referenceDisque;
    }

    public function setReferenceDisque(?string $referenceDisque): self
    {
        $this->referenceDisque = $referenceDisque;

        return $this;
    }

    public function getCodeAlbum(): ?Album
    {
        return $this->codeAlbum;
    }

    public function setCodeAlbum(?Album $codeAlbum): self
    {
        $this->codeAlbum = $codeAlbum;

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
            $compoDisque->setDisque($this);
        }

        return $this;
    }

    public function removeCompoDisque(CompositionDisque $compoDisque): self
    {
        if ($this->compoDisque->contains($compoDisque)) {
            $this->compoDisque->removeElement($compoDisque);
            // set the owning side to null (unless already changed)
            if ($compoDisque->getDisque() === $this) {
                $compoDisque->setDisque(null);
            }
        }

        return $this;
    }

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }

}
