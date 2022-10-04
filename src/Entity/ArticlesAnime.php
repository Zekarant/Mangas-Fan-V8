<?php

namespace App\Entity;

use App\Repository\ArticlesAnimeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesAnimeRepository::class)]
class ArticlesAnime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'articlesAnimes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animes $idAnime = null;

    #[ORM\Column(length: 255)]
    private ?string $titleArticle = null;

    #[ORM\Column(length: 255)]
    private ?string $coverArticle = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAnime(): ?Animes
    {
        return $this->idAnime;
    }

    public function setIdAnime(?Animes $idAnime): self
    {
        $this->idAnime = $idAnime;

        return $this;
    }

    public function getTitleArticle(): ?string
    {
        return $this->titleArticle;
    }

    public function setTitleArticle(string $titleArticle): self
    {
        $this->titleArticle = $titleArticle;

        return $this;
    }

    public function getCoverArticle(): ?string
    {
        return $this->coverArticle;
    }

    public function setCoverArticle(string $coverArticle): self
    {
        $this->coverArticle = $coverArticle;

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
