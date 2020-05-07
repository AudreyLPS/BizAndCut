<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Coiffures;
use App\Repository\InscCoifRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method InscCoif|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscCoif|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscCoif[]    findAll()
 * @method InscCoif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscCoifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscCoif::class);
    }

	
}