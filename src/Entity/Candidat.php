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
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="candidat")
     */
    private Collection $skills;

    /**
     * @ORM\OneToMany(targetEntity=Experience::class, mappedBy="candidat")
     */
    private Collection $experiences;

    public function __construct()
    {
        $this->softSkills = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->experiences = new ArrayCollection();
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
    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setCandidat($this);
        }

        return $this;
    }
    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getCandidat() === $this) {
                $skill->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setCandidat($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidat() === $this) {
                $experience->setCandidat(null);
            }
        }

        return $this;
    }
}
