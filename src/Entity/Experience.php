<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(max = 100)
     */
    private string $jobName;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     * @Assert\Length(max = 100)
     */
    private string $place;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $referentName;

    /**
     * @ORM\ManyToOne(targetEntity=Candidat::class, inversedBy="experiences")
     */
    private ?Candidat $candidat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $phoneReferent;

    /**
     * @ORM\ManyToOne(targetEntity=Contrat::class, inversedBy="experiences")
     */
    private ?Contrat $contrat;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private \DateTimeInterface $startDate;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private \DateTimeInterface $endDate;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobName(): ?string
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): self
    {
        $this->jobName = $jobName;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReferentName(): ?string
    {
        return $this->referentName;
    }

    public function setReferentName(?string $referentName): self
    {
        $this->referentName = $referentName;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): self
    {
        $this->candidat = $candidat;

        return $this;
    }

    public function getPhoneReferent(): ?string
    {
        return $this->phoneReferent;
    }

    public function setPhoneReferent(?string $phoneReferent): self
    {
        $this->phoneReferent = $phoneReferent;

        return $this;
    }

    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function setContrat(?Contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
