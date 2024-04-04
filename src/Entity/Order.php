<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order", indexes={@ORM\Index(name="Userid", columns={"Userid"}), @ORM\Index(name="fkidbasket", columns={"idB"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="idO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ido;

    /**
     * @var float
     *
     * @ORM\Column(name="totalP", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalp;

    /**
     * @var string
     *
     * @ORM\Column(name="dateC", type="string", length=255, nullable=false)
     */
    private $datec;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Userid", referencedColumnName="user_id")
     * })
     */
    private $userid;

    /**
     * @var \Basket
     *
     * @ORM\ManyToOne(targetEntity="Basket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idB", referencedColumnName="idB")
     * })
     */
    private $idb;

    public function getIdo(): ?int
    {
        return $this->ido;
    }

    public function getTotalp(): ?float
    {
        return $this->totalp;
    }

    public function setTotalp(float $totalp): static
    {
        $this->totalp = $totalp;

        return $this;
    }

    public function getDatec(): ?string
    {
        return $this->datec;
    }

    public function setDatec(string $datec): static
    {
        $this->datec = $datec;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getIdb(): ?Basket
    {
        return $this->idb;
    }

    public function setIdb(?Basket $idb): static
    {
        $this->idb = $idb;

        return $this;
    }


}
