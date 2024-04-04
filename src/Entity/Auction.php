<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AuctionRepository;
use Doctrine\Common\Collections\Collection; 
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AuctionRepository::class)]
class Auction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 20)]
    private ?string $auctionname = null;

    #[ORM\Column(type: "integer")]
    private ?int $price = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $date = null;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $time = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: "string", length: 250, nullable: true)]
    private ?string $imgpath = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(name: "Userid", referencedColumnName: "user_id")]
    private ?Users $userid = null;

    // Getters and setters...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuctionname(): ?string
    {
        return $this->auctionname;
    }

    public function setAuctionname(string $auctionname): self
    {
        $this->auctionname = $auctionname;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

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

    public function getImgpath(): ?string
    {
        return $this->imgpath;
    }

    public function setImgpath(?string $imgpath): self
    {
        $this->imgpath = $imgpath;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid): self
    {
        $this->userid = $userid;

        return $this;
    }
    // In src/Entity/Auction.php


    #[ORM\OneToMany(targetEntity: Bid::class, mappedBy: "idAuction")]
    private Collection $bids;
    
    public function __construct()
    {
        $this->bids = new ArrayCollection();
    }
    
    public function getBids(): Collection
    {
        return $this->bids;
    }
    

}
