<?php

namespace App\Repository;

use App\Entity\Devis;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


class DevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Devis::class);
    }

    public function search(string $search):Query{
        $results = $this->createQueryBuilder('devis')
        ->where ('devis.name LIKE :search')
        ->setParameters([
            'search'=>"%$search%"
        ])
        ->getQuery()
        ;
        
        return $results;
    }
}
