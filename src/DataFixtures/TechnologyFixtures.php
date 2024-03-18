<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TechnologyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $technologyData = [
            [
                'name' => 'HTML',
                'description' => "Durant mes années de lycée, j'ai suivie des cours de HTML en lien avec ma spéciatilé en NSI (numérique et science de l'informatique),
                que j'ai pu mettre à profit durant ma formation en BTS SIO option slam.",
            ],

            [
                'name' => 'CSS',
                'description' => "Durant mes années de lycée, j'ai suivie des cours de CSS en lien avec ma spéciatilé en NSI (numérique et science de l'informatique),
                que j'ai pu mettre à profit durant ma formation en BTS SIO option slam.",
            ],

            [
                'name' => 'Javascript',
                'description' => "J'ai découvert le javascript dans le cadre des besoins. J'ai du alors effectuer des veilles afin de pouvoir répondre au besoins
                du projet. "
            ],

            [
                'name' => 'ThreeJs',
                'description' => "ThreeJs est une bibliotéque javascript que j'ai des couvert via à des recommandations, cette technologie a attiré mon intérêt et 
                donc j'ai décidé de l'utiliser afin de pouvoir réaliser un projet."
            ],

            [
                'name' => 'PHP',
                'description' => "J'ai découvert le PHP via à ma formation en BTS SIO ce qui m'a permit de réaliser divers projet utilisant une base donnée."
            ],

            [
                'name' => 'Symfony',
                'description' => "Symfony est un framework PHP que j'ai découvert via à ma formation et qui m'a permit  divers projet utilisant une base donnée."
            ],

            [
                'name' => 'Python',
                'description' => "Durant mes années de lycée, j'ai suivie des cours de python en lien avec ma spéciatilé en NSI (numérique et science de l'informatique),
                que j'ai pu mettre à profit durant ma formation en BTS SIO option slam."
            ],

            [
                'name' => 'C#',
                'description' => "J'ai découvert le C# via à ma formation en BTS SIO ce qui m'a permit de réaliser des applications lourdes afin de répondre
                à des besoins spécifiques."
            ],

            [
                'name' => 'MySql',
                'description' => "Durant mes années de lycée, j'ai suivie des cours de MySql en lien avec ma spéciatilé en NSI (numérique et science de l'informatique),
                que j'ai pu mettre à profit durant ma formation en BTS SIO option slam."
            ],

            [
                'name' => 'NEXT',
                'description' => "J'ai découvert ce framework de react lors de ma recherche de stage durant ma premiére année de BTS SIO, j'ai
                donc réaliser un petit projet de groupe afin de pouvoir réaliser une initiation."
            ],

            [
                'name' => 'React',
                'description' => "En faisant des recherches sur le framework NEXT, j'ai découvert React qui est une technologie avec laquel je veux réaliser
                divers projets."
            ],

            [
                'name' => 'Ajax',
                'description' => "Ajax est une technologie sut laquel je me suis initié afin de répondre au besoin d'un projet qui était que faire de requette SQL
                sans faire de rafraichissement de page."
            ],
        ];

        foreach ($technologyData as $data) {
            $technology = new Technology();
            $technology->setName($data['name']); 
            $technology->setDescription($data['description']); 
            $technology->setImage($this->getReference(ImageFixtures::ETERNAL_IMAGE));
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
