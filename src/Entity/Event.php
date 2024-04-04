<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event", indexes={@ORM\Index(name="Userid", columns={"Userid"})})
 * @ORM\Entity
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="idE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ide;

    /**
     * @var string
     *
     * @ORM\Column(name="nameE", type="string", length=255, nullable=false)
     */
    private $namee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateE", type="date", nullable=false)
     */
    private $datee;

    /**
     * @var int
     *
     * @ORM\Column(name="durationE", type="integer", nullable=false)
     */
    private $duratione;

    /**
     * @var string
     *
     * @ORM\Column(name="typeE", type="string", length=255, nullable=false)
     */
    private $typee;

    /**
     * @var float
     *
     * @ORM\Column(name="entryFeeE", type="float", precision=10, scale=0, nullable=false)
     */
    private $entryfeee;

    /**
     * @var int
     *
     * @ORM\Column(name="capacityE", type="integer", nullable=false)
     */
    private $capacitye;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Userid", referencedColumnName="user_id")
     * })
     */
    private $userid;

    public function getIde(): ?int
    {
        return $this->ide;
    }

    public function getNamee(): ?string
    {
        return $this->namee;
    }

    public function setNamee(string $namee): static
    {
        $this->namee = $namee;

        return $this;
    }

    public function getDatee(): ?\DateTimeInterface
    {
        return $this->datee;
    }

    public function setDatee(\DateTimeInterface $datee): static
    {
        $this->datee = $datee;

        return $this;
    }

    public function getDuratione(): ?int
    {
        return $this->duratione;
    }

    public function setDuratione(int $duratione): static
    {
        $this->duratione = $duratione;

        return $this;
    }

    public function getTypee(): ?string
    {
        return $this->typee;
    }

    public function setTypee(string $typee): static
    {
        $this->typee = $typee;

        return $this;
    }

    public function getEntryfeee(): ?float
    {
        return $this->entryfeee;
    }

    public function setEntryfeee(float $entryfeee): static
    {
        $this->entryfeee = $entryfeee;

        return $this;
    }

    public function getCapacitye(): ?int
    {
        return $this->capacitye;
    }

    public function setCapacitye(int $capacitye): static
    {
        $this->capacitye = $capacitye;

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


}
