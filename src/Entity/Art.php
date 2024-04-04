<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\ArtRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtRepository::class)]
class Art
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_art", type: "integer")]    
    private ?int $id_art;
    
    #[ORM\Column(length:255)]
    private ?string $title;

    #[ORM\Column(length:255)]
    private ?string $materials;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $height;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $width;

    #[ORM\Column(length:255)]
    private ?string $type;

    #[ORM\Column(length:255)]
    private ?string $city;

    #[ORM\Column(length:255)]
    private ?string $description;

    #[ORM\Column(type: "float", nullable: true)]
    private ?float $price;

    #[ORM\Column(length:255)]
    private ?string $pathImage;

    #[ORM\Column(name: "dateCreation", type: "datetime", nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $datecreation;

    #[ORM\Column(length:255)]
    private ?string $video;

    #[ORM\Column(type: "integer", nullable: false)]
    private ?int $userid = 1;

    #[ORM\Column(type: "integer", nullable: false)]
    private ?int $id_category = 1;

    
    public function getIdArt(): ?int
    {
        return $this->id_art;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function getMaterials(): ?string
    {
        return $this->materials;
    }

    public function setMaterials(string $materials)
    {
        $this->materials = $materials;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height)
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width)
    {
        $this->width = $width;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    public function getPathImage(): ?string
    {
        return $this->pathImage;
    }

    public function setPathImage(string $pathImage)
    {
        $this->pathImage = $pathImage;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video)
    {
        $this->video = $video;

        return $this;
    }

    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }

    public function setIdCategory(?int $idCategory): static
    {
        $this->id_category = $idCategory;

        return $this;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

  
    public function setUserid(?int $userid): static
    {
        $this->userid = $userid;

        return $this;
    }


}
