<?php
namespace App\Entity;

use DateTimeInterface;
use App\Repository\IntershipRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Intership{
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

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setDatetime(?string $value): void
    {
        $format = 'Y-m-d';
        $datetime = \DateTime::createFromFormat($format, $value);
    
        if ($datetime === false) {
            throw new \InvalidArgumentException("Invalid datetime format: $value. Expected format: $format");
        }
    
        $this->datetime = $datetime;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}