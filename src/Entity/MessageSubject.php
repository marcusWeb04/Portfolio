<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MessageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MessageSubjectRepository::class)]
class MessageSubject{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToONe(targetEntity: Message::Class ,inversedBy: 'messages')]
    private Message $message;

    #[ORM\ManyToONe(targetEntity: Subject::Class ,inversedBy: 'subjects')]
    private Subject $subject;

    #[ORM\Column(type: 'string')]
    private string $date;


    // constructeur
    public function __constructer()
    {
        $this->date = $date;
        $this->message = $message;
        $this->subject = $subject;
        $this->messages = new ArrayCollection();
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getContent(): string
    {
        $this->content;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setEmail(string $email): void
    {
        $this->email=$email;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}