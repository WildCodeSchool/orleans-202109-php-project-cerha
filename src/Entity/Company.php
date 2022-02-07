<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank(groups={"company"})
     * @Assert\Length(max=100,groups={"company"})
     */
    private ?string $denomination;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     * @Assert\NotBlank(message="Le SIRET est obligatoire.",groups={"company"})
     * @Assert\Luhn(message="Numéro de SIRET invalide.",groups={"company"})
     * @Assert\Length(max=14, groups={"company"})
     */
    private ?string $siret;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Assert\NotBlank(groups={"company"})
     * @Assert\Length(max=5, groups={"company"})
     */
    private ?string $apeCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups={"company"})
     * @Assert\Length(max=255, groups={"company"})
     */
    private ?string $address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Assert\NotBlank(groups={"company"})
     * @Assert\Length(max=5, groups={"company"})
     */
    private ?string $postalCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank(groups={"company"})
     * @Assert\Length(max=100, groups={"company"})
     */
    private ?string $city;

    /**
     * @ORM\Column(type="string", length=13, nullable=true)
     * @Assert\NotBlank(groups={"company"})
     * @Assert\Length(max=13, groups={"company"})
     */
    private ?string $vatNumber;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank(groups={"contactCompany"})
     * @Assert\Length(max=100, groups={"contactCompany"})
     */
    private ?string $contactRole;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="company", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid(groups={"contactCompany"})
     */
    private ?User $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Assert\Url
     */
    private ?string $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Assert\Url
     */
    private ?string $linkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Assert\Url
     */
    private ?string $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Assert\Url
     */
    private ?string $instagram;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $need;

    /**
     * @ORM\OneToMany(targetEntity=CompanyComment::class, mappedBy="company")
     */
    private Collection $companyComments;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Assert\NotBlank (groups={"company"})
     * @Assert\Type("string", groups={"company"})
     * @Assert\Length(max=10, groups={"company"})
     */
    private ?string $companyNumber;

    public function __construct()
    {
        $this->companyComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(?string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getApeCode(): ?string
    {
        return $this->apeCode;
    }

    public function setApeCode(?string $apeCode): self
    {
        $this->apeCode = $apeCode;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(?string $vatNumber): self
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    public function getContactRole(): ?string
    {
        return $this->contactRole;
    }

    public function setContactRole(string $contactRole): self
    {
        $this->contactRole = $contactRole;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getNeed(): ?string
    {
        return $this->need;
    }

    public function setNeed(?string $need): self
    {
        $this->need = $need;

        return $this;
    }

    /**
     * @return Collection|CompanyComment[]
     */
    public function getCompanyComments(): Collection
    {
        return $this->companyComments;
    }

    public function addCompanyComment(CompanyComment $companyComment): self
    {
        if (!$this->companyComments->contains($companyComment)) {
            $this->companyComments[] = $companyComment;
            $companyComment->setCompany($this);
        }

        return $this;
    }

    public function removeCompanyComment(CompanyComment $companyComment): self
    {
        if ($this->companyComments->removeElement($companyComment)) {
            // set the owning side to null (unless already changed)
            if ($companyComment->getCompany() === $this) {
                $companyComment->setCompany(null);
            }
        }

        return $this;
    }

    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->companyNumber = $companyNumber;

        return $this;
    }
}
