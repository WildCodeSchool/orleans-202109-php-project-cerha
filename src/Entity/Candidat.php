<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatRepository::class)
 */
class Candidat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTimeInterface $birthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $address;

    /**
     * @ORM\Column(type="integer")
     */
    private string $postalCode;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private string $city;

    /**
     * @ORM\OneToMany(targetEntity=SoftSkill::class, mappedBy="candidat", orphanRemoval=true)
     */
    private Collection $softSkills;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="candidat", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ?User $user;

    /**
     * @ORM\OneToMany(targetEntity=Hobby::class, mappedBy="candidat", orphanRemoval=true)
     */
    private Collection $hobbies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $timeSearch;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $searchQuality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $profilQuality;

    public function __construct()
    {
        $this->softSkills = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|SoftSkill[]
     */
    public function getSoftSkills(): Collection
    {
        return $this->softSkills;
    }

    public function addSoftSkill(SoftSkill $softSkill): self
    {
        if (!$this->softSkills->contains($softSkill)) {
            $this->softSkills[] = $softSkill;
            $softSkill->setCandidat($this);
        }

        return $this;
    }

    public function removeSoftSkill(SoftSkill $softSkill): self
    {
        if ($this->softSkills->removeElement($softSkill)) {
            // set the owning side to null (unless already changed)
            if ($softSkill->getCandidat() === $this) {
                $softSkill->setCandidat(null);
            }
        }

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

    /**
     * @return Collection|Hobby[]
     */
    public function getHobbies(): Collection
    {
        return $this->hobbies;
    }

    public function addHobby(Hobby $hobby): self
    {
        if (!$this->hobbies->contains($hobby)) {
            $this->hobbies[] = $hobby;
            $hobby->setCandidat($this);
        }

        return $this;
    }

    public function removeHobby(Hobby $hobby): self
    {
        if ($this->hobbies->removeElement($hobby)) {
            // set the owning side to null (unless already changed)
            if ($hobby->getCandidat() === $this) {
                $hobby->setCandidat(null);
            }
        }

        return $this;
    }

    public function getTimeSearch(): ?string
    {
        return $this->timeSearch;
    }

    public function setTimeSearch(?string $timeSearch): self
    {
        $this->timeSearch = $timeSearch;

        return $this;
    }

    public function getSearchQuality(): ?string
    {
        return $this->searchQuality;
    }

    public function setSearchQuality(?string $searchQuality): self
    {
        $this->searchQuality = $searchQuality;

        return $this;
    }

    public function getProfilQuality(): ?string
    {
        return $this->profilQuality;
    }

    public function setProfilQuality(?string $profilQuality): self
    {
        $this->profilQuality = $profilQuality;

        return $this;
    }
}
