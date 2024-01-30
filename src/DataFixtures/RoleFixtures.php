<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public const DEVELOPEUR_ROLE = "DEVELOPEUR_ROLE";

    public const UX_UI_ROLE = "UX_UI_ROLE";

    public const ARTIST_ROLE = "ARTIST_ROLE";

    const ROLE_LIST = [
        self::DEVELOPEUR_ROLE=>[
            "name" => "developeur"
        ],
        self::UX_UI_ROLE=>[
            "name" => "UX/UI"
        ],
        self::ARTIST_ROLE=>[
            "name" => "ARTIST"
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ROLE_LIST as $data) {
            $image = new Image();
            $image->setName($data['name']);
            $manager->persist($image);
        }

        $manager->flush();
    }
}