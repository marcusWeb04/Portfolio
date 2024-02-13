<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

    #[ORM\Column(type: 'string')]
    private string $alt;

    #[ORM\Column(type: 'string')]
    private string $link;

    #[ORM\ManyToMany(targetEntity: Artist::class, mappedBy: 'artists')]
    private Collection $images;

    #[ORM\OneToMany(mappedBy:'image', targetEntity: Project::class)]
    private Collection $projects;

    #[ORM\OneToMany(mappedBy:'image', targetEntity: LearnMore::class)]
    private Collection $learnMores;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: Technology::class)]
    private Collection $technologies;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: Certification::class)]
    private Collection $certifications;

    public function __construct()
    {
        $this->projects = new arrayCollection();
        $this->learnMores = new arrayCollection();
        $this->technologies = new arrayCollection();
        $this->certifications = new arrayCollection();
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

    public function getAlt(): string
    {
        return $this->alt;
    }
    
    public function getLink(): ?string
    {
        return $this->link;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setAlt(string $alt): void
    {
        $this->alt=$alt;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }
}