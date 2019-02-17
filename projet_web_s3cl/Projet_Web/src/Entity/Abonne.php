<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Abonne
 *
 * @ORM\Table(name="Abonne", indexes={@ORM\Index(name="IDX_719E8EC620B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity(repositoryClass="App\Repository\AbonneRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Abonne implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code_Abonne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAbonne;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Abonne", type="string", length=50, nullable=false)
     */
    private $nomAbonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Login", type="string", length=10, nullable=true)
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Password", type="string", length=80, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse", type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Code_Postal", type="string", length=50, nullable=true)
     */
    private $codePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=0, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserId", type="string", length=128, nullable=true)
     */
    private $userid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Credit", type="integer", nullable=true)
     */
    private $credit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Prenom_Abonne", type="string", length=40, nullable=true)
     */
    private $prenomAbonne;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;

    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Achat", mappedBy="abonne")
     */
    private $achats;

    public function __construct()
    {
        $this->achats = new ArrayCollection();
    }

    public function getCodeAbonne(): ?int
    {
        return $this->codeAbonne;
    }

    public function getNomAbonne(): ?string
    {
        return $this->nomAbonne;
    }

    public function setNomAbonne(string $nomAbonne): self
    {
        $this->nomAbonne = $nomAbonne;

        return $this;
    }

    public function getLogin(): ?string
    {
        return (string) $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return (string) $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserid(): ?string
    {
        return $this->userid;
    }

    public function setUserid(?string $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(?int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getPrenomAbonne(): ?string
    {
        return $this->prenomAbonne;
    }

    public function setPrenomAbonne(?string $prenomAbonne): self
    {
        $this->prenomAbonne = $prenomAbonne;

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
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return array (Role|string)[] The user roles
     */
    public function getRoles()
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
       return "fabda";
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return (string) $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Achat[]
     */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Achat $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats[] = $achat;
            $achat->setAbonne($this);
        }

        return $this;
    }

    public function removeAchat(Achat $achat): self
    {
        if ($this->achats->contains($achat)) {
            $this->achats->removeElement($achat);
            // set the owning side to null (unless already changed)
            if ($achat->getAbonne() === $this) {
                $achat->setAbonne(null);
            }
        }

        return $this;
    }
}
