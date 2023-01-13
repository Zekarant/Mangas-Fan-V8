<?php

namespace App\Entity\Manga;

use App\Entity\Traits\CreateUpdateTime;
use App\Repository\Manga\TomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TomeRepository::class)]
class Tome
{
    use CreateUpdateTime; // TODO: really necessary ?

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $coverPicture = null;

    #[ORM\ManyToOne(inversedBy: 'tomeMangas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Manga $idManga = null;

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

    public function getCoverPicture(): ?string
    {
        return $this->coverPicture;
    }

    public function setCoverPicture(string $coverPicture): self
    {
        $this->coverPicture = $coverPicture;

        return $this;
    }

    public function getIdManga(): ?Manga
    {
        return $this->idManga;
    }

    public function setIdManga(?Manga $idManga): self
    {
        $this->idManga = $idManga;

        return $this;
    }
}
