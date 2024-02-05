<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArtistFixtures extends Fixture
{
    public const Kavin = "KAVIN";
    public const KEVIN_TRAN = "KEVIN_TRAN";
    public const NEZCA = "NEZCA";

    const ARTIST_LIST = [
        self::Kavin => [
            "name" => "Kavin"
        ],
        self::KEVIN_TRAN => [
            "name" => "Kevin Tran"
        ],
        self::NEZCA => [
            "name" => "Nezca"
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ARTIST_LIST as $data) {
            $artist = new Artist();
            $artist->setName($data['name']);
            $manager->persist($artist);
        }

        $manager->flush();
    }
}