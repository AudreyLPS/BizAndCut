<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Entreprises;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Entreprises|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entreprises|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entreprises[]    findAll()
 * @method Entreprises[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class EntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entreprises::class);
    }

}
