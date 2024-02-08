<?php

namespace App\DataFixtures;

use App\Entity\Study;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $studyData = [
            [
                'name' => 'Lycée Marie Cury',
                'description' => 'J’ai obtenu mon bac avec les spécialités
                science de l’ingénieur et numérique science de l’informatique',
                'date' => '2022/06/29'
            ],

            [
                'name' => 'Saint Vincent',
                'description' => 'J’étudie actuellement au lycée Saint Vincent le développement dans le cadre d’un BTS SIO option slam',
                'date' => '2023/09/02'
            ],

        ];

        foreach ($studyData as $data) {
            $study = new Study();
            $study->setName($data['name']);
            $study->setDescription($data['description']);
            $study->setDatetime($data['date']);
            $manager->persist($study);
        }

        $manager->flush();
    }
}
