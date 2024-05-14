<?php

namespace App\Entity;

use App\Repository\AnimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimeRepository::class)]
class Anime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $synopsis = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column]
    private bool $isFavorite = false;

    /**
     * @var Collection<int, ArticleAnime>
     */
    #[ORM\OneToMany(mappedBy: 'anime', targetEntity: ArticleAnime::class, orphanRemoval: true)]
    private Collection $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

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

    public function getIsFavorite(): ?int
    {
        return $this->isFavorite;
    }

    public function setIsFavorite(?int $isFavorite): self
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    /**
     * @return Collection<int, ArticleAnime>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticlesAnime(ArticleAnime $articlesAnime): self
    {
        if (!$this->articles->contains($articlesAnime)) {
            $this->articles->add($articlesAnime);
            $articlesAnime->setAnime($this);
        }

        return $this;
    }

    public function removeArticlesAnime(ArticleAnime $articlesAnime): self
    {
        if ($this->articles->removeElement($articlesAnime)) {
            // set the owning side to null (unless already changed)
            if ($articlesAnime->getAnime() === $this) {
                $articlesAnime->setAnime(null);
            }
        }

        return $this;
    }
}
