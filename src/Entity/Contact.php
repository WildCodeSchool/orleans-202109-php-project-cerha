<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{

    private $company;


    private $candidate;

    /**
     * @Assert\NotBlank
     */
    private $lastName;

    /**
     */
    private $firstName;

    /**
     * @Assert\NotBlank
     */
    private $phone;

    /**
     * @Assert\NotBlank
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=10)
     */
    private $message;

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getCandidate(): ?string
    {
        return $this->candidate;
    }

    public function setCandidate(string $candidate): self
    {
        $this->candidate = $candidate;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
