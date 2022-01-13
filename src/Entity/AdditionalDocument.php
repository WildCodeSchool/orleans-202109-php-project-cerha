<?php

namespace App\Entity;

use App\Repository\AdditionalDocumentRepository;
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
     * @var File
     * @Assert\File(
     *     maxSize = "1M",
     *     mimeTypes = {"application/pdf", "application/x-pdf", "image/*", "application/msword",
     *                  "application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.wordprocessingml.document",
     *                  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
     *                  "application/vnd.openxmlformats-officedocument.presentationml.presentation","text/plain"})
     */
    private $documentFile;

    /**
     * @ORM\ManyToOne(targetEntity=Candidat::class, inversedBy="additionalDocuments")
     */
    private ?Candidat $candidat;

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

    /**
     * Get the value of documentFile
     *
     * @return  File
     */
    public function getDocumentFile()
    {
        return $this->documentFile;
    }

    /**
     * Set the value of documentFile
     *
     * @param  File  $documentFile
     *
     * @return  self
     */
    public function setDocumentFile(File $documentFile)
    {
        $this->documentFile = $documentFile;

        return $this;
    }
}
