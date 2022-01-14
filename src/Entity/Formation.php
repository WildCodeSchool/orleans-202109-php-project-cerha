<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
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
    private string $title;

    /**
     * @ORM\Column(type="string", length=100)
     *  @Assert\NotBlank
     *  @Assert\Length(max = 100)
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
    private ?string $referent;

    /**
     * @ORM\ManyToOne(targetEntity=Candidat::class, inversedBy="formations")
     */
    private ?Candidat $candidat;

    /**
     * @ORM\ManyToOne(targetEntity=FormationLevel::class, inversedBy="formations")
     * @Assert\NotBlank
     */
    private ?FormationLevel $level;

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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $phoneReferent;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getReferent(): ?string
    {
        return $this->referent;
    }

    public function setReferent(string $referent): self
    {
        $this->referent = $referent;

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

    public function getLevel(): ?FormationLevel
    {
        return $this->level;
    }

    public function setLevel(?FormationLevel $level): self
    {
        $this->level = $level;

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

    public function getPhoneReferent(): ?string
    {
        return $this->phoneReferent;
    }

    public function setPhoneReferent(?string $phoneReferent): self
    {
        $this->phoneReferent = $phoneReferent;

        return $this;
    }
}
