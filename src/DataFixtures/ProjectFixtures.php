<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PORTFOLIO_PROJECT = "PORTFOLIO_PROJECT";
    public const CSE_SAINT_VINCENT_PROJECT = "CSE_SAINT_VINCENT_PROJECT";
    public const COFFERA_PROJECT = "COFFERA_PROJECT";

    const PROJECT_LIST = [
        self::PORTFOLIO_PROJECT => [
            "title" => "portfolio",
            "description" => "Cette plateforme en ligne est un projet visant à présenter les projets que j'ai réalisés."
        ],
        self::CSE_SAINT_VINCENT_PROJECT => [
            "title" => "CSE_SAINT_VINCENT_PROJECT",
            "description" => "Ce projet est une application qui a dû être développée dans le cadre de la validation de ma première année d'étude supérieure."
        ],
        self::COFFERA_PROJECT => [
            "title" => "COFFERA_PROJECT",
            "description" => "Ce projet est un site vitrine d'un café fictif."
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECT_LIST as $reference => $data) {
            $project = new Project();
            $project->setTitle($data['title']);
            $project->setDescription($data['description']);
            $manager->persist($project);

            $this->addReference($reference, $project);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ImageFixtures::class,
            TypeProjectFixtures::class
        ];
    }
}
