<?php
namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TechnologyRepository::class)]
class Technology{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\ManytoMany(targetEntity: Project::class, mappedBy: 'technologies')]
    private Collection $projects;

    #[ORM\ManyToOne(targetEntity: Image::class, inversedBy: 'technologies')]
    private Image $image;

    // constructeur
    public function __constructer()
    {
        $this->images = new ArrayCollections();
    }

    // getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // setter
    public function setTitle(string $title): void
    {
        $this->title=$title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}