<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidateRepository::class)
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class Candidate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private \DateTimeInterface $birthDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     */
    private string $address;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(max=5)
     */
    private string $postalCode;

    /**
     * @ORM\Column(type="string", length=155)
     * @Assert\NotBlank
     * @Assert\Length(max=155)
     */
    private string $city;

    /**
     * @ORM\OneToMany(targetEntity=SoftSkill::class,
     * mappedBy="candidate", orphanRemoval=true, cascade={"persist", "remove"})
     * @Assert\Count(max = 5)
     * @Assert\Valid
     */
    private Collection $softSkills;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="candidate", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @assert\Valid
     */
    private ?User $user;

    /**
     * @ORM\OneToMany(targetEntity=Hobby::class,
     * mappedBy="candidate", orphanRemoval=true, cascade={"persist", "remove"})
     * @Assert\Count(max = 5)
     * @Assert\Valid
     */
    private Collection $hobbies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private ?string $timeSearch;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private ?string $searchQuality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private ?string $profilQuality;

    /**
     * @ORM\OneToMany(targetEntity=CandidateLanguage::class,
     * mappedBy="candidate", orphanRemoval=true, cascade={"persist", "remove"})
     * @Assert\Unique
     * @Assert\Valid
     */
    private Collection $candidateLanguages;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class,  mappedBy="candidate",
     *  orphanRemoval=true, cascade={"persist", "remove"})
     */
    private Collection $skills;


    /**
     * @ORM\OneToMany(targetEntity=Experience::class,  mappedBy="candidate",
     *  orphanRemoval=true, cascade={"persist", "remove"})
     */
    private Collection $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class,  mappedBy="candidate",
     *  orphanRemoval=true, cascade={"persist", "remove"})
     */
    private Collection $formations;

    /**
     * @ORM\OneToMany(targetEntity=AdditionalDocument::class,
     *  mappedBy="candidate",orphanRemoval=true, cascade={"persist", "remove"})
     */
    private Collection $additionalDocuments;

    /**
     * @ORM\OneToMany(targetEntity=CandidateComment::class, mappedBy="candidate")
     */
    private Collection $candidateComments;



    public function __construct()
    {
        $this->softSkills = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
        $this->candidateLanguages = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->additionalDocuments = new ArrayCollection();
        $this->candidateComments = new ArrayCollection();
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
            $softSkill->setCandidate($this);
        }

        return $this;
    }

    public function removeSoftSkill(SoftSkill $softSkill): self
    {
        if ($this->softSkills->removeElement($softSkill)) {
            // set the owning side to null (unless already changed)
            if ($softSkill->getCandidate() === $this) {
                $softSkill->setCandidate(null);
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
            $hobby->setCandidate($this);
        }

        return $this;
    }

    public function removeHobby(Hobby $hobby): self
    {
        if ($this->hobbies->removeElement($hobby)) {
            // set the owning side to null (unless already changed)
            if ($hobby->getCandidate() === $this) {
                $hobby->setCandidate(null);
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

    /**
     * @return Collection|CandidateLanguage[]
     */
    public function getCandidateLanguages(): Collection
    {
        return $this->candidateLanguages;
    }

    public function addCandidateLanguage(CandidateLanguage $candidateLanguage): self
    {
        if (!$this->candidateLanguages->contains($candidateLanguage)) {
            $this->candidateLanguages[] = $candidateLanguage;
            $candidateLanguage->setCandidate($this);
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
            $skill->setCandidate($this);
        }

        return $this;
    }

    public function removeCandidateLanguage(CandidateLanguage $candidateLanguage): self
    {
        if ($this->candidateLanguages->removeElement($candidateLanguage)) {
            // set the owning side to null (unless already changed)
            if ($candidateLanguage->getCandidate() === $this) {
                $candidateLanguage->setCandidate(null);
            }
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getCandidate() === $this) {
                $skill->setCandidate(null);
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
            $experience->setCandidate($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidate() === $this) {
                $experience->setCandidate(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setCandidate($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getCandidate() === $this) {
                $formation->setCandidate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AdditionalDocument[]
     */
    public function getAdditionalDocuments(): Collection
    {
        return $this->additionalDocuments;
    }

    public function addAdditionalDocument(AdditionalDocument $additionalDocument): self
    {
        if (!$this->additionalDocuments->contains($additionalDocument)) {
            $this->additionalDocuments[] = $additionalDocument;
            $additionalDocument->setCandidate($this);
        }

        return $this;
    }

    public function removeAdditionalDocument(AdditionalDocument $additionalDocument): self
    {
        if ($this->additionalDocuments->removeElement($additionalDocument)) {
            // set the owning side to null (unless already changed)
            if ($additionalDocument->getCandidate() === $this) {
                $additionalDocument->setCandidate(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|CandidateComment[]
     */
    public function getCandidateComments(): Collection
    {
        return $this->candidateComments;
    }

    public function addCandidateComment(CandidateComment $candidateComment): self
    {
        if (!$this->candidateComments->contains($candidateComment)) {
            $this->candidateComments[] = $candidateComment;
            $candidateComment->setCandidate($this);
        }

        return $this;
    }

    public function removeCandidateComment(CandidateComment $candidateComment): self
    {
        if ($this->candidateComments->removeElement($candidateComment)) {
            // set the owning side to null (unless already changed)
            if ($candidateComment->getCandidate() === $this) {
                $candidateComment->setCandidate(null);
            }
        }

        return $this;
    }
}
