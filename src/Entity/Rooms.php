<?php

namespace App\Entity;

use App\Repository\RoomsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomsRepository::class)]
class Rooms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $capacity = null;

    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Material::class, inversedBy: 'rooms')]
    private Collection $material;

    #[ORM\ManyToMany(targetEntity: Ergonomics::class, inversedBy: 'rooms')]
    private Collection $Ergonomic;

    #[ORM\ManyToMany(targetEntity: Software::class, inversedBy: 'rooms')]
    private Collection $Software;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: Reservations::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->material = new ArrayCollection();
        $this->Ergonomic = new ArrayCollection();
        $this->Software = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function setCapacity(string $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Material>
     */
    public function getMaterial(): Collection
    {
        return $this->material;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->material->contains($material)) {
            $this->material->add($material);
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        $this->material->removeElement($material);

        return $this;
    }

    /**
     * @return Collection<int, Ergonomics>
     */
    public function getErgonomic(): Collection
    {
        return $this->Ergonomic;
    }

    public function addErgonomic(Ergonomics $ergonomic): self
    {
        if (!$this->Ergonomic->contains($ergonomic)) {
            $this->Ergonomic->add($ergonomic);
        }

        return $this;
    }

    public function removeErgonomic(Ergonomics $ergonomic): self
    {
        $this->Ergonomic->removeElement($ergonomic);

        return $this;
    }

    /**
     * @return Collection<int, Software>
     */
    public function getSoftware(): Collection
    {
        return $this->Software;
    }

    public function addSoftware(Software $software): self
    {
        if (!$this->Software->contains($software)) {
            $this->Software->add($software);
        }

        return $this;
    }

    public function removeSoftware(Software $software): self
    {
        $this->Software->removeElement($software);

        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setRoom($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRoom() === $this) {
                $reservation->setRoom(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->city . " " . $this->address . " " . $this->description;
    }

}