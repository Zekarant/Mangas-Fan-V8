<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MangaRepository::class)]
class Manga
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $isFinish = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * @var Collection<int, TomeManga>
     */
    #[ORM\OneToMany(mappedBy: 'manga', targetEntity: TomeManga::class, orphanRemoval: true)]
    private Collection $tomes;

    public function __construct()
    {
        $this->tomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsFinish(): ?int
    {
        return $this->isFinish;
    }

    public function setIsFinish(int $isFinish): self
    {
        $this->isFinish = $isFinish;

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
     * @return Collection<int, TomeManga>
     */
    public function getTomes(): Collection
    {
        return $this->tomes;
    }

    public function addTomeManga(TomeManga $tomeManga): self
    {
        if (!$this->tomes->contains($tomeManga)) {
            $this->tomes->add($tomeManga);
            $tomeManga->setManga($this);
        }

        return $this;
    }

    public function removeTomeManga(TomeManga $tomeManga): self
    {
        if ($this->tomes->removeElement($tomeManga)) {
            // set the owning side to null (unless already changed)
            if ($tomeManga->getManga() === $this) {
                $tomeManga->setManga(null);
            }
        }

        return $this;
    }
}
