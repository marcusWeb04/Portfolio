<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\LearnMore;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LearnMoreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $learnMore = new LearnMore();

        $learnMore->setDescription('Je m’appelle Marcus, j’étudie actuellement
        au lycée Saint-Vincent situé dans la ville de Senlis, le développement web.
        
        Les projets informatiques m’ont toujours intéressé
        que ce soit de par les idées, la conception et la
        maintenance.
        
        Ci-dessous, vous trouverez les différents projets sur lesquels j\'ai travaillé, 
        qui témoigneront de mes compétences et des technologies que j\'ai utilisées.');

        $learnMore->setImage($this->getReference(ImageFixtures::ETERNAL_IMAGE));
        
        $manager->persist($learnMore);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ImageFixtures::class
        ];
    }
}