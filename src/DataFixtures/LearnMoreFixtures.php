<?php

namespace App\DataFixtures;

use App\Entity\LearnMore;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LearnMoreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $learnMore = new LearnMore();
        $learnMore->setDescrition('Je m’appelle Marcus, j’étudie actuellement
        au lycée Saint-Vincent situé dans la ville de Senlis, le développement web.
        
        Les projets informatiques m’ont toujours intéressé
        que ce soit de par les idées, la conception et la
        maintenance.
        
        Ci-dessous, vous trouverez les différents projets sur lesquels j\'ai travaillé, 
        qui témoigneront de mes compétences et des technologies que j\'ai utilisées.');
        
        $manager->persist($learnMore);

        $manager->flush();
    }
}