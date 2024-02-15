<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

    #[ORM\OneToMany(mappedBy: 'subject', targetEntity: Message::class)]
    private Collection $messages;


    // constructeur
    public function __constructer()
    {
        $this->messages = new arrayCollection();
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

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }
}