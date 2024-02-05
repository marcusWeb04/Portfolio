<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Certification;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CertificationFixtures extends Fixture
{
    public const HTML_CSS = "HTML_CSS";
    public const PHP_MYSQL = "PHP_MYSQL";


    const CERTIFICATION_LIST = [
        self::HTML_CSS => [
            "title" => "HTML/CSS",
            "description" => "Découvrez les bases du développement web avec notre formation intensive en HTML/CSS. En seulement quatre semaines, vous maîtriserez les compétences fondamentales pour concevoir des sites web attractifs et fonctionnels.",
            "link" => "https://openclassrooms.com/fr/courses/1603881-creez-votre-site-web-avec-html5-et-css3"
        ],
        self::PHP_MYSQL => [
            "title" => "MYSQL/PHP",
            "description" => "PHP : Domptez le langage de script côté serveur, intégrez-le dans des pages HTML pour créer des sites web dynamiques. Bénéficiez d'une communauté dynamique et de frameworks puissants pour un développement efficace. MySQL : Plongez dans la gestion de bases de données relationnelles avec MySQL. Maximisez performance, fiabilité et simplicité. Intégrez MySQL avec PHP pour une gestion efficace des données dans les applications web.",
            "link" => "https://openclassrooms.com/fr/courses/1234567-formation-mysql-php"
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CERTIFICATION_LIST as $data) {
            $certification = new Certification();
            $certification->setTitle($data['title']);
            $certification->setDescription($data['description']);
            $certification->setLink($data['link']);

            $manager->persist($certification);

            $this->addReference($data, $certification);
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