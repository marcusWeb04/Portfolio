<?php
namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ImageRepository;
use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

    #[ORM\Column(type: 'date')]
    private \DateTime $datetime;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\Column(type: 'string')]
    private bool $mainProject;

    #[ORM\ManyToOne(targetEntity: Image::class, inversedBy: 'projects')]
    private Image $image;

    #[ORM\ManyToOne(targetEntity: TypeProject::class, inversedBy: 'projects')]
    private TypeProject $type;

    #[ORM\ManytoMany(targetEntity: Role::class, inversedBy: 'projects')]
    private Collection $roles;

    #[ORM\ManytoMany(targetEntity: Technology::class, mappedBy: 'projects')]
    private Collection $technologies;

    // constructeur
    public function __constructer()
    {
        $this->technologies= new ArrayCollection();
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

    public function getDatetime(): \DateTime
    {
        return $this->datetime;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getMainProject(): bool
    {
        return $this->mainProject;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setDatetime(string $value):void
    {
        $format = 'Y-m-d';
        $dateTime = \DateTime::createFromFormat($format, $value);

        $this->datetime=$dateTime;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setMainProject(bool $mainProject):void
    {
        $this->mainProject = $mainProject;
    }

    public function setImage(Image $image): void
    {
        $this->image=$image;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }
}