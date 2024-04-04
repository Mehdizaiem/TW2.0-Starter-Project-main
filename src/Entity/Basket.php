<?php

namespace App\Entity;
use App\Repository\BasketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BasketRepository::class)]
class Basket
{
    #[ORM\Id]
    #[ORM\GenerateValue]
    #[ORM\Column]

    private ?int $idb = null;

   #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $totalPrice=null;

    #[ORM\ManyToOne(inversedBy:'users')]
    private ?users $userid; 

    #[ORM\ManyToOne(inversedBy:'art')]
    private ?art $id_art;

    public function getIdb(): ?int
    {
        return $this->idb;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): static
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getUserid(): ?users
    {
        return $this->userid;
    }

    public function setUserid(?users $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getIdArt(): ?art
    {
        return $this->id_art;
    }

    public function setIdArt(?art $id_art): static
    {
        $this->id_art = $id_art;

        return $this;
    }

}
