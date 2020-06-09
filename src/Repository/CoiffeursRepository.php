<?php

namespace App\Repository;

use App\Entity\Coiffeurs;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Coiffeurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coiffeurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coiffeurs[]    findAll()
 * @method Coiffeurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class CoiffeursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coiffeurs::class);
    }

}
