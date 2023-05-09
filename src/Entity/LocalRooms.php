<?php

namespace App\Entity;

use App\Repository\LocalRoomsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalRoomsRepository::class)]
class LocalRooms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $roomCapacity = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Ergonomics::class, inversedBy: 'localRooms')]
    private Collection $id_ergonomics;

    #[ORM\ManyToMany(targetEntity: Material::class, inversedBy: 'localRooms')]
    private Collection $id_material;

    #[ORM\ManyToMany(targetEntity: Software::class, inversedBy: 'localRooms')]
    private Collection $id_software;

    #[ORM\ManyToMany(targetEntity: Reservation::class, mappedBy: 'id_localroom')]
    private Collection $reservations;

    public function __construct()
    {
        $this->id_ergonomics = new ArrayCollection();
        $this->id_material = new ArrayCollection();
        $this->id_software = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomCapacity(): ?string
    {
        return $this->roomCapacity;
    }

    public function setRoomCapacity(string $roomCapacity): self
    {
        $this->roomCapacity = $roomCapacity;

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Ergonomics>
     */
    public function getIdErgonomics(): Collection
    {
        return $this->id_ergonomics;
    }

    public function addIdErgonomic(Ergonomics $idErgonomic): self
    {
        if (!$this->id_ergonomics->contains($idErgonomic)) {
            $this->id_ergonomics->add($idErgonomic);
        }

        return $this;
    }

    public function removeIdErgonomic(Ergonomics $idErgonomic): self
    {
        $this->id_ergonomics->removeElement($idErgonomic);

        return $this;
    }

    /**
     * @return Collection<int, Material>
     */
    public function getIdMaterial(): Collection
    {
        return $this->id_material;
    }

    public function addIdMaterial(Material $idMaterial): self
    {
        if (!$this->id_material->contains($idMaterial)) {
            $this->id_material->add($idMaterial);
        }

        return $this;
    }

    public function removeIdMaterial(Material $idMaterial): self
    {
        $this->id_material->removeElement($idMaterial);

        return $this;
    }

    /**
     * @return Collection<int, Software>
     */
    public function getIdSoftware(): Collection
    {
        return $this->id_software;
    }

    public function addIdSoftware(Software $idSoftware): self
    {
        if (!$this->id_software->contains($idSoftware)) {
            $this->id_software->add($idSoftware);
        }

        return $this;
    }

    public function removeIdSoftware(Software $idSoftware): self
    {
        $this->id_software->removeElement($idSoftware);

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->addIdLocalroom($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeIdLocalroom($this);
        }

        return $this;
    }
}
