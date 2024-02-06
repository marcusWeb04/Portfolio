<?php
namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Study{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

    #[ORM\Column(type: 'date')]
    private ?DateTime $datetime;

    #[ORM\Column(type: 'string')]
    private string $description;

    // getter
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDatetime(): DateTime
    {
        return $this->datetime;
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

    public function setDatetime(DateTime $datetime): void
    {
        $this->datetime=$datetime;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}