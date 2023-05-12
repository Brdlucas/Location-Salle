<?php

namespace App\Entity;

use App\Repository\ErgonomicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ErgonomicRepository::class)]
class Ergonomic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?bool $sunLight = null;

    #[ORM\Column]
    private ?bool $artificialLight = null;

    #[ORM\Column]
    private ?bool $PMR = null;

    #[ORM\OneToMany(mappedBy: 'ergonomic', targetEntity: Rooms::class)]
    private Collection $rooms;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function isSunLight(): ?bool
    {
        return $this->sunLight;
    }

    public function setSunLight(bool $sunLight): self
    {
        $this->sunLight = $sunLight;

        return $this;
    }

    public function isArtificialLight(): ?bool
    {
        return $this->artificialLight;
    }

    public function setArtificialLight(bool $artificialLight): self
    {
        $this->artificialLight = $artificialLight;

        return $this;
    }

    public function isPMR(): ?bool
    {
        return $this->PMR;
    }

    public function setPMR(bool $PMR): self
    {
        $this->PMR = $PMR;

        return $this;
    }

    /**
     * @return Collection<int, Rooms>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Rooms $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
            $room->setErgonomic($this);
        }

        return $this;
    }

    public function removeRoom(Rooms $room): self
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getErgonomic() === $this) {
                $room->setErgonomic(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return "Surface : " . $this->surface . " / PMR : " . $this->PMR;;
    }
}