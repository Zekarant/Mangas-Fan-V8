<?php

namespace App\Entity;

use App\Repository\TomeMangasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TomeMangasRepository::class)]
class TomeMangas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameTome = null;

    #[ORM\Column(length: 255)]
    private ?string $coverTome = null;

    #[ORM\ManyToOne(inversedBy: 'tomeMangas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Mangas $idManga = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTome(): ?string
    {
        return $this->nameTome;
    }

    public function setNameTome(string $nameTome): self
    {
        $this->nameTome = $nameTome;

        return $this;
    }

    public function getCoverTome(): ?string
    {
        return $this->coverTome;
    }

    public function setCoverTome(string $coverTome): self
    {
        $this->coverTome = $coverTome;

        return $this;
    }

    public function getIdManga(): ?Mangas
    {
        return $this->idManga;
    }

    public function setIdManga(?Mangas $idManga): self
    {
        $this->idManga = $idManga;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
