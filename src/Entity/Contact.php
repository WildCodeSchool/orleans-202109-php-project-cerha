<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    private string $company;


    private string $candidate;

    /**
     * @Assert\NotBlank
     */
    private string $lastName;

    /**
     * @Assert\NotBlank
     */
    private string $firstName;

    /**
     * @Assert\NotBlank
     * @Assert\Regex(pattern="/^[0-9]*$/")
     */
    private string $phone;

    /**
     * @Assert\NotBlank
     * @Assert\Email()
     */
    private string $email;

    /**
     * @Assert\NotBlank
     */
    private string $message;

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
