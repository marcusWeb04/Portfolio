<?php
namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TypeProject::class)]
class TypeProject{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $title;

    #[ORM\OneToMany(targetEntity: Project::class, mappedBy: 'type')]
    private Collection $projects;

    // constructeur
    public function __constructer(){
        $this->projects = new ArrayCollections;
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

    // setter
    public function setTitle(string $title): void
    {
        $this->title=$title;
    }

}