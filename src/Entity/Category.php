<?php

namespace App\Entity;
use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_category", type: "integer")]
    private ?int $id_category;

    #[ORM\Column(length: 255)]
    private ?string $name;

    #[ORM\Column(length: 255)]
    private ?string $date;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    private ?Users $userid;

    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }

    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid)
    {
        $this->userid = $userid;

        return $this;
    }
}
