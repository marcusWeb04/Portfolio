<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RoleFixtures extends Fixture
{
    public const DEVELOPEUR_ROLE = "STAGE_ROLE";
    public const UX_UI_ROLE = "PROJET_ROLE";
    public const EMPLOIE_ROLE = "EMPLOIE_ROLE";
    public const QUESTION_ROLE = "QUESTION_ROLE";

    const ROLE_LIST = [
        self::DEVELOPEUR_ROLE => [
            "name" => "DEVELOPEUR_ROLE",
        ]
        ,
        self::UX_UI_ROLE => [
            "name" => "UX_UI_ROLE",
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ROLE_LIST as $reference => $data) {
            $role = new Role();
            $role->setName($data['name']);
            $manager->persist($role);

            $this->addReference($reference, $role);
        }

        $manager->flush();
    }
}