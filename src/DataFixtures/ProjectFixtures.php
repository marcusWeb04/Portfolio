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
            "name" => "portfolio",
            "description" => "Cette plateforme en ligne est un projet visant à présenter les projets que j'ai réalisés.",
            "date" => "2024/02/24",
            "bestproject" => "true",
        ]
        ,
        self::CSE_SAINT_VINCENT_PROJECT => [
            "name" => "CSE_SAINT_VINCENT_PROJECT",
            "description" => "Ce projet est une application qui a dû être développée dans le cadre de la validation de ma première année d'étude supérieure.",
            "date" => "2023/06/13",
            "bestproject" => "false",
        ],
        self::COFFERA_PROJECT => [
            "name" => "COFFERA_PROJECT",
            "description" => "Ce projet est un site vitrine d'un café fictif.",
            "date" => "2023/09/15",
            "bestproject" => "false",
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECT_LIST as $reference => $data) {
            $project = new Project();
            $project->setName($data['name']);
            $project->setDescription($data['description']);
            $project->setDatetime($data['date']);
            $project->setRole($this->getReference(RoleFixtures::DEVELOPEUR_ROLE));
            $project->setMainProject($data['bestproject']);
            $project->setType($this->getReference(TypeProjectFixtures::SUPERVISER_TYPE_PROJET));
            $project->setImage($this->getReference(ImageFixtures::ETERNAL_IMAGE));
            $manager->persist($project);

            $this->addReference($reference, $project);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ImageFixtures::class,
            RoleFixtures::class,
            TypeProjectFixtures::class
        ];
    }
}
