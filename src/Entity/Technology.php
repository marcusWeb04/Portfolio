<?php
namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TechnologyRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Technology{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

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

    public function getName(): string
    {
        return $this->name;
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
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setImage(Image $image): void
    {
        $this->image=$image;
    }

}