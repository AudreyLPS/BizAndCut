<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Coiffures;
use App\Repository\Insc_coifRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Insc_coif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Insc_coif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Insc_coif[]    findAll()
 * @method Insc_coif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Insc_coifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Insc_coif::class);
    }

	
}