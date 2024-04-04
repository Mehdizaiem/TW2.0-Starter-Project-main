<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BidRepository;

#[ORM\Entity(repositoryClass: BidRepository::class)]
class Bid
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idbid", type: "integer")]
    private ?int $idbid = null;

    #[ORM\Column(name: "bidamount", type: "integer")]
    private ?int $bidamount = null;

    #[ORM\ManyToOne(targetEntity: Auction::class, inversedBy: "bids")]
    #[ORM\JoinColumn(name: "idAuction", referencedColumnName: "id")]
    private ?Auction $idAuction = null;
    

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(name: "Userid", referencedColumnName: "user_id")]
    private ?Users $userid = null;

    public function getIdbid(): ?int
    {
        return $this->idbid;
    }

    public function setIdbid(?int $idbid): self
    {
        $this->idbid = $idbid;

        return $this;
    }

    public function getBidamount(): ?int
    {
        return $this->bidamount;
    }

    public function setBidamount(int $bidamount): self
    {
        $this->bidamount = $bidamount;

        return $this;
    }

    public function getIdAuction(): ?Auction
    {
        return $this->idAuction;
    }

    public function setIdAuction(?Auction $idAuction): self
    {
        $this->idAuction = $idAuction;

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
}
