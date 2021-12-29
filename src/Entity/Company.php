<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=100)
     */
    private string $denomination;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private string $siret;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private string $apeCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $address;

    /**
     * @ORM\Column(type="integer")
     */
    private int $postalCode;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private string $vatNumber;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $contactRole;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getApeCode(): ?string
    {
        return $this->apeCode;
    }

    public function setApeCode(string $apeCode): self
    {
        $this->apeCode = $apeCode;

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

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
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

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(string $vatNumber): self
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
}
