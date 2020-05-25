<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Propositions;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Propositions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propositions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propositions[]    findAll()
 * @method Propositions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class PropositionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Propositions::class);
    }

    
}
