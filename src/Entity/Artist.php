<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Artist extends Role{

    #[ORM\ManyToMany(targetEntity: Image::class, inversedBy: 'images')]
    private Collection $artists;
}