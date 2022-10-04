<?php

namespace App\Entity;

use App\Repository\MangasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MangasRepository::class)]
class Mangas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameManga = null;

    #[ORM\Column]
    private ?int $finishManga = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'idManga', targetEntity: TomeMangas::class, orphanRemoval: true)]
    private Collection $tomeMangas;

    public function __construct()
    {
        $this->tomeMangas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameManga(): ?string
    {
        return $this->nameManga;
    }

    public function setNameManga(string $nameManga): self
    {
        $this->nameManga = $nameManga;

        return $this;
    }

    public function getFinishManga(): ?int
    {
        return $this->finishManga;
    }

    public function setFinishManga(int $finishManga): self
    {
        $this->finishManga = $finishManga;

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
     * @return Collection<int, TomeMangas>
     */
    public function getTomeMangas(): Collection
    {
        return $this->tomeMangas;
    }

    public function addTomeManga(TomeMangas $tomeManga): self
    {
        if (!$this->tomeMangas->contains($tomeManga)) {
            $this->tomeMangas->add($tomeManga);
            $tomeManga->setIdManga($this);
        }

        return $this;
    }

    public function removeTomeManga(TomeMangas $tomeManga): self
    {
        if ($this->tomeMangas->removeElement($tomeManga)) {
            // set the owning side to null (unless already changed)
            if ($tomeManga->getIdManga() === $this) {
                $tomeManga->setIdManga(null);
            }
        }

        return $this;
    }
}
