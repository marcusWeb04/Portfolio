<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArtistFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $artistData = [
            [
                'name' => 'Kavin',
            ],

            [
                'name' => 'Kevin Tran',
            ],

            [
                'name' => 'Nezca',
            ],
        ];

        foreach ($artistData as $data) {
            $artist = new Artist();
            $artist->setName($data['name']);
            $manager->persist($artist);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ImageFixtures::class,
        ];
    }
}