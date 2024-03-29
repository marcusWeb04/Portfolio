<?php

namespace App\DataFixtures;

use App\Entity\TypeProject;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TypeProjectFixtures extends Fixture
{
    public const SUPERVISER_TYPE_PROJET = "SUPERVISER_TYPE_PROJET";
    public const POC_TYPE_PROJET = "POC_TYPE_PROJET";
    public const PERSONAL_TYPE_PROJET = "PERSONAL_TYPE_PROJET"; // Corrected constant name

    const TYPE_PROJET_LIST = [
        self::SUPERVISER_TYPE_PROJET => [
            "title" => "Superviser",
        ],
        self::POC_TYPE_PROJET => [
            "title" => "POC",
        ],
        self::PERSONAL_TYPE_PROJET => [
            "title" => "Personnelle", // Corrected title for consistency
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TYPE_PROJET_LIST as $reference => $data) {
            $type = new TypeProject();
            $type->setTitle($data['title']);
            $manager->persist($type);

            $this->addReference($reference, $type); // Corrected reference to $type
        }

        $manager->flush();
    }
}
