<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MessageRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message{
    // attribut
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

    #[ORM\Column(type: 'string')]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $content;

    #[ORM\Column(type: 'date')]
    private \Datetime $date;

    #[ORM\ManyToONe(targetEntity: Subject::Class ,inversedBy: 'messages')]
    private Subject $subject;

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getContent(): string
    {
        $this->content;
    }

    public function getSubject(): Subject
    {
        return $this->subject;
    }

    // setter
    public function setName(string $name): void
    {
        $this->name=$name;
    }

    public function setDatetime(string $value): void
    {
        $format = 'Y/m/d';
        $date = \DateTime::createFromFormat($format, $value);
    
        if ($date !== false) {
            $this->datetime = $date;
        } else {
            throw new \InvalidArgumentException("La valeur '$value' n'est pas une date valide au format '$format'.");
        }
    }

    public function setEmail(string $email): void
    {
        $this->email=$email;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setSubject(Subject $subject) :void
    {
        $this->subject = $subject;
    }
}