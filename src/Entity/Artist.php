<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist extends Role{

    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'images')]
    private Collection $artists;

    // getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }
}