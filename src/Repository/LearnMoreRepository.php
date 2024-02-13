<?php

namespace App\Repository;

use App\Entity\LearnMore;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Slider|null find($id, $lockMode = null, $lockVersion = null)
 * @method Slider|null findOneBy(array $criteria, array $orderBy = null)
 * @method Slider[]    findAll()
 * @method Slider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */


class LearnMoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LearnMore::class);
    }
}