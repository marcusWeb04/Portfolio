<?php

namespace App\DataFixtures;

use App\Entity\Intership;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IntershipFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $intershipData = [
            [
                'name' => 'E2C',
                'description' => 'Découvrez le développement web en quatre semaines ! Notre formation intensive en HTML/CSS vous enseigne la
                création de sites web attrayants et fonctionnels. Apprenez à structurer le contenu avec HTML, à styliser avec CSS, à 
                concevoir des interfaces adaptables et à intégrer des éléments multimédias. À la fin de la formation, vous maîtriserez la 
                création complète de sites web, de la conception à la réalisation, selon les normes de l\'industrie. Adaptée aux débutants 
                passionnés, aux designers et aux entrepreneurs, cette formation propose des cours interactifs en ligne, des exercices 
                pratiques et un projet final concret. Lancez-vous dans le développement web et donnez vie à vos idées !',
                'date'=>'2024-02-20'
            ],
            
            [
                'name' => 'Saint Vincent',
                'description' => 'Durant ce stage de 8 semaines au sein du lycée, j’ai dû réaliser un projet qui nous a été donné par le lycée.',
                'date'=>'2024-02-20'
            ]
        ];

        foreach ($intershipData as $data) {
            $intership = new Intership();
            $intership->setName($data['name']);
            $intership->setDescription($data['description']);
            $intership->setDatetime($data['date']);
            $manager->persist($intership);
        }

        $manager->flush();
    }
}
