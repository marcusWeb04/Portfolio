<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TechnologyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $technologyData = [
            [
                'name' => 'HTML',
                'description' => 'Le HyperText Markup Language, généralement abrégé HTML ou, dans sa dernière version, HTML5, est le 
                langage de balisage conçu pour représenter les pages web.',
            ],

            [
                'name' => 'CSS',
                'description' => 'Les feuilles de style en cascade, généralement appelées CSS de l\'anglais Cascading Style Sheets, 
                forment un langage informatique qui décrit la présentation des documents HTML et XML. Les standards définissant CSS sont 
                publiés par le World Wide Web Consortium',
            ],

            [
                'name' => 'Javascript',
                'description' => 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web 
                interactives et à ce titre est une partie essentielle des applications web. Avec les langages HTML et CSS, JavaScript est 
                au cœur des langages utilisés par les développeurs web. '
            ],
        ];

        foreach($technologyData as $data){
            $technology = new Technology();
            $technology->setTitle($data['name']);
            $technology->setDecription($data['description']);
            $manager->persist($technology);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ImageFixtures::class
        ];
    }
}