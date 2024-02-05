<?php

namespace App\DataFixtures;

use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubjectFixtures extends Fixture
{
    public const JOB_SUBJECT = "JOB_SUBJECT";

    public const INTERSHIP_SUBJECT = "INTERSHIP_SUBJECT";

    public const QUESTION_SUBJECT = "QUESTION_SUBJECT";

    public const PROJECT_SUBJECT = "PROJECT_SUBJECT";

    const SUBJECT_LIST = [
        self::JOB_SUBJECT=>[
            "name" => "Emploie"
        ],
        self::INTERSHIP_SUBJECT=>[
            "name" => "Stage"
        ],
        self::QUESTION_SUBJECT=>[
            "name" => "Question"
        ],
        self::PROJECT_SUBJECT=>[
            "name" => "Projet"
        ]
    ];

    public function load(ObjectManager $manager): void
    {   
        foreach($SUBJECT_LIST as $data){
            $study = new Study();
            $study->setTitle($data['name']);
            $study->setDecription($data['description']);
            $manager->persist($study);
        }

        $manager->flush();

        foreach(self::SUBJECT_LIST as $data){
            $this->addReference($data, $certification);
        }
    }
}