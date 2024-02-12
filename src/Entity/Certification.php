<?php
namespace App\Entity;

use DateTime;
use App\Repository\CertificationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Certification{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'date')]
    private \DateTime $datetime;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\Column(type: 'string')]
    private string $link;

    #[ORM\ManyToOne(targetEntity: Image::class, inversedBy: 'certifications')]
    private Image $image;

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

    public function getLink(): string
    {
        return $this->link;
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

    public function setDatetime(?string $value): void
    {
        if ($value === null) {
            $this->datetime = null;
        } else {
            $format = 'Y-m-d';
            $dateTime = \DateTime::createFromFormat($format, $value);
    
            if ($dateTime instanceof \DateTime) {
                $this->datetime = $dateTime;
            } else {
                throw new \InvalidArgumentException("Invalid datetime format: $value. Expected format: $format");
            }
        }
    }

    public function setLink(string $link): void 
    {
        $this->link=$link;
    }

    public function setImage(Image $image): void 
    {
        $this->image = $image;
    }

}