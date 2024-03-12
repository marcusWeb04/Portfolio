<?php
namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;
use App\Repository\LearnMoreRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LearnMoreRepository::class)]
class LearnMore{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 500)]
    private string $description;

    #[ORM\ManyToOne(targetEntity: Image::class, inversedBy: 'learnMores')]
    private Image $image;

    // getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    // setter
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setImage(Image $image): void 
    {
        $this->image = $image;
    }

}