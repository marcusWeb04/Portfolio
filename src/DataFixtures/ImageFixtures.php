<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    public const PORTFOLIO_IMAGE = "PORTFOLIO_IMAGE";
    public const ETERNAL_IMAGE = "ETERNAL_IMAGE";
    public const BENTO_IMAGE = "BENTO_IMAGE";

    const IMAGE_LIST = [
        self::PORTFOLIO_IMAGE => [
            "name" => "portfolio",
            "alt" => "icon de mon portfolio",
            "link" => "img/portfolio.webp",
        ],
        self::ETERNAL_IMAGE => [
            "name" => "eternal",
            "alt" => "icon du site eternal",
            "link" => "img/eternal.webp",
        ],
        self::BENTO_IMAGE => [
            "name" => "bento",
            "alt" => "icon du site eternal",
            "link" => "img/bento.webp",
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::IMAGE_LIST as $reference => $data) {
            $image = new Image();
            $image->setName($data['name']);
            $image->setAlt($data['alt']);
            $image->setLink($data['link']);
            $manager->persist($image);

            $this->addReference($reference, $image);
        }

        $manager->flush();
    }
}