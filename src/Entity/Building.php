<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $number;

    #[ORM\Column(type: 'integer')]
    private $appartment_quantity;

    #[ORM\ManyToOne(targetEntity: Street::class, inversedBy: 'buildings')]
    #[ORM\JoinColumn(nullable: false)]
    private $street;

    #[ORM\OneToMany(mappedBy: 'building', targetEntity: Appartment::class)]
    private $appartments;

    public function __construct()
    {
        $this->appartments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getAppartmentQuantity(): ?int
    {
        return $this->appartment_quantity;
    }

    public function setAppartmentQuantity(int $appartment_quantity): self
    {
        $this->appartment_quantity = $appartment_quantity;

        return $this;
    }

    public function getStreet(): ?Street
    {
        return $this->street;
    }

    public function setStreet(?Street $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return Collection|Appartment[]
     */
    public function getAppartments(): Collection
    {
        return $this->appartments;
    }

    public function addAppartment(Appartment $appartment): self
    {
        if (!$this->appartments->contains($appartment)) {
            $this->appartments[] = $appartment;
            $appartment->setBuilding($this);
        }

        return $this;
    }

    public function removeAppartment(Appartment $appartment): self
    {
        if ($this->appartments->removeElement($appartment)) {
            // set the owning side to null (unless already changed)
            if ($appartment->getBuilding() === $this) {
                $appartment->setBuilding(null);
            }
        }

        return $this;
    }
}
