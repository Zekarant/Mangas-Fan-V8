<?php

namespace App\Entity;

use App\Repository\AnimesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimesRepository::class)]
class Animes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titleAnime = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageAnime = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $synopsisAnime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $coupCoeur = null;

    /**
     * @var Collection<int, ArticlesAnime>
     */
    #[ORM\OneToMany(mappedBy: 'idAnime', targetEntity: ArticlesAnime::class, orphanRemoval: true)]
    private Collection $articlesAnimes;

    public function __construct()
    {
        $this->articlesAnimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleAnime(): ?string
    {
        return $this->titleAnime;
    }

    public function setTitleAnime(string $titleAnime): self
    {
        $this->titleAnime = $titleAnime;

        return $this;
    }

    public function getImageAnime(): ?string
    {
        return $this->imageAnime;
    }

    public function setImageAnime(?string $imageAnime): self
    {
        $this->imageAnime = $imageAnime;

        return $this;
    }

    public function getSynopsisAnime(): ?string
    {
        return $this->synopsisAnime;
    }

    public function setSynopsisAnime(?string $synopsisAnime): self
    {
        $this->synopsisAnime = $synopsisAnime;

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

    public function getCoupCoeur(): ?int
    {
        return $this->coupCoeur;
    }

    public function setCoupCoeur(?int $coupCoeur): self
    {
        $this->coupCoeur = $coupCoeur;

        return $this;
    }

    /**
     * @return Collection<int, ArticlesAnime>
     */
    public function getArticlesAnimes(): Collection
    {
        return $this->articlesAnimes;
    }

    public function addArticlesAnime(ArticlesAnime $articlesAnime): self
    {
        if (!$this->articlesAnimes->contains($articlesAnime)) {
            $this->articlesAnimes->add($articlesAnime);
            $articlesAnime->setIdAnime($this);
        }

        return $this;
    }

    public function removeArticlesAnime(ArticlesAnime $articlesAnime): self
    {
        if ($this->articlesAnimes->removeElement($articlesAnime)) {
            // set the owning side to null (unless already changed)
            if ($articlesAnime->getIdAnime() === $this) {
                $articlesAnime->setIdAnime(null);
            }
        }

        return $this;
    }
}
