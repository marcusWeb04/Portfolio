<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MessageFixtures extends Fixture
{
    public const EMPLOIE = "EMPLOIE";
    public const STAGE = "UX_UI";
    public const QUESTION = "QUESTION";

    const MESSAGE_LIST = [
        self::EMPLOIE => [
            "name" => "Emma",
            "email" => "email@email.com",
            "content" => "Bonjour j'aurais besoin d'un site ecommerce",
        ],
        self::STAGE => [
            "name" => "Matthias",
            "email" => "email@email.com",
            "content" => "Bonjour je voudrais vous proposer un stage d'emmertion pour votre projet",
        ],
        self::QUESTION => [
            "name" => "Claire",
            "email" => "email@email.com",
            "content" => "Bonjour je voudrais savoir comment supprimer mes données personelles",
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::MESSAGE_LIST as $data) {
            $artist = new Message();
            $artist->setName($data['name']);
            $artist->setEmail($data['email']);
            $artist->setContent($data['constent']);
            $manager->persist($artist);
        }

        $manager->flush();
    }
}