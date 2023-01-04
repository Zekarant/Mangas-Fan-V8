<?php

namespace App\Entity;

use App\Model\TimestampedInterface;
use App\Repository\NewsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News implements TimestampedInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titleNews = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionNews = null;

    #[ORM\Column(length: 255)]
    private ?string $contentNews = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $keywordsNews = null;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updatedAt;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'news')]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'news', targetEntity: Comments::class, orphanRemoval: true)]
    private Collection $comments;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn]
    private ?Images $image = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleNews(): ?string
    {
        return $this->titleNews;
    }

    public function setTitleNews(string $titleNews): self
    {
        $this->titleNews = $titleNews;

        return $this;
    }

    public function getDescriptionNews(): ?string
    {
        return $this->descriptionNews;
    }

    public function setDescriptionNews(string $descriptionNews): self
    {
        $this->descriptionNews = $descriptionNews;

        return $this;
    }

    public function getContentNews(): ?string
    {
        return $this->contentNews;
    }

    public function setContentNews(string $contentNews): self
    {
        $this->contentNews = $contentNews;

        return $this;
    }

    public function getKeywordsNews(): ?string
    {
        return $this->keywordsNews;
    }

    public function setKeywordsNews(?string $keywordsNews): self
    {
        $this->keywordsNews = $keywordsNews;

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

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addNews($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeNews($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setNews($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getNews() === $this) {
                $comment->setNews(null);
            }
        }

        return $this;
    }

    public function getImage(): ?Images
    {
        return $this->image;
    }

    public function setImage(?Images $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
