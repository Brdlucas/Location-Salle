<?php

namespace App\Entity;

use App\Repository\SoftwareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoftwareRepository::class)]
class Software
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: LocalRooms::class, mappedBy: 'id_software')]
    private Collection $localRooms;

    public function __construct()
    {
        $this->localRooms = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, LocalRooms>
     */
    public function getLocalRooms(): Collection
    {
        return $this->localRooms;
    }

    public function addLocalRoom(LocalRooms $localRoom): self
    {
        if (!$this->localRooms->contains($localRoom)) {
            $this->localRooms->add($localRoom);
            $localRoom->addIdSoftware($this);
        }

        return $this;
    }

    public function removeLocalRoom(LocalRooms $localRoom): self
    {
        if ($this->localRooms->removeElement($localRoom)) {
            $localRoom->removeIdSoftware($this);
        }

        return $this;
    }
}
