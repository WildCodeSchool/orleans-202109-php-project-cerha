<?php

namespace App\Entity;

use App\Repository\AdditionalDocumentRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdditionalDocumentRepository::class)
 * @Vich\Uploadable
 */
class AdditionalDocument
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $name;

    /**
     * @Vich\UploadableField(mapping="documents_candidate", fileNameProperty="name")
     * @var File|null
     * @Assert\File(
     *     maxSize = "1M",
     *     mimeTypes = {"application/pdf", "application/x-pdf", "image/*", "application/msword",
     *                  "application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.wordprocessingml.document",
     *                  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
     *                  "application/vnd.openxmlformats-officedocument.presentationml.presentation","text/plain",
     *                  "application/vnd.oasis.opendocument.text"})
     */
    private $documentFile;

    /**
     * @ORM\ManyToOne(targetEntity=Candidat::class, inversedBy="additionalDocuments")
     */
    private ?Candidat $candidat;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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


    public function setDocumentFile(?File $documentFile = null): void
    {
        $this->documentFile = $documentFile;

        if (null !== $documentFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getDocumentFile(): ?File
    {
        return $this->documentFile;
    }


    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }
}
