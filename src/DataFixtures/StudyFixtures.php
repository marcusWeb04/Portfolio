<?php

namespace App\DataFixtures;

use App\Entity\Study;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StudyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $studyData = [
            [
                'name' => 'Lycée Marie Cury',
                'description' => 'J’ai obtenue mon bac avec les spécialitées
                science de l’ingénieur et numérique science de l’informatique'
            ],

            [
                'name' => 'Saint Vincent',
                'description' => 'J’étudie actuellement au lycée Saint Vincent le dévellopement dans le cade d’un BTS SIO option slam'
            ],

        ];

        

        foreach($studyData as $data){
            $study = new Study();
            $study->setTitle($data['name']);
            $study->setDecription($data['description']);
            $manager->persist($study);
        }

        $manager->flush();
    }
}