<?php

namespace App\Entity\Anime;

use App\Entity\Traits\AnimeMangaCommon;
use App\Repository\Anime\AnimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimeRepository::class)]
class Anime
{
    use AnimeMangaCommon;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(options: [ 'default' => false ])]
    private bool $isFavoriteMonthly = false;

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

    public function isFavoriteMonthly(): bool
    {
        return $this->isFavoriteMonthly;
    }

    public function setFavoriteMonthly(bool $isFavoriteMonthly): self
    {
        $this->isFavoriteMonthly = $isFavoriteMonthly;

        return $this;
    }

    /**
     * @return Collection<int, ArticleAnime>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticles(ArticleAnime $articles): self
    {
        if (!$this->articles->contains($articles)) {
            $this->articles->add($articles);
            $articles->setAnime($this);
        }

        return $this;
    }

    public function removeArticles(ArticleAnime $articles): self
    {
        if ($this->articles->removeElement($articles)) {
            // set the owning side to null (unless already changed)
            if ($articles->getAnime() === $this) {
                $articles->setAnime(null);
            }
        }

        return $this;
    }
}
