<?php

namespace App\Entity\Manga;

use App\Entity\Traits\AnimeMangaCommon;
use App\Repository\Manga\MangaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MangaRepository::class)]
class Manga
{
    // TODO: change it at parent class if we have templates or controller who use anime / manga with only common information
    use AnimeMangaCommon;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(options: [ 'default' => false ])]
    private bool $isFinish = false;

    #[ORM\OneToMany(mappedBy: 'manga', targetEntity: Tome::class, orphanRemoval: true)]
    private Collection $tomes;

    public function __construct()
    {
        $this->tomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isFinish(): ?int
    {
        return $this->isFinish;
    }

    public function setFinishManga(int $isFinish): self
    {
        $this->isFinish = $isFinish;

        return $this;
    }

    /**
     * @return Collection<int, Tome>
     */
    public function getTomeMangas(): Collection
    {
        return $this->tomes;
    }

    public function addTomeManga(Tome $tomeManga): self
    {
        if (!$this->tomes->contains($tomeManga)) {
            $this->tomes->add($tomeManga);
            $tomeManga->setIdManga($this);
        }

        return $this;
    }

    public function removeTomeManga(Tome $tomeManga): self
    {
        if ($this->tomes->removeElement($tomeManga)) {
            // set the owning side to null (unless already changed)
            if ($tomeManga->getIdManga() === $this) {
                $tomeManga->setIdManga(null);
            }
        }

        return $this;
    }
}
