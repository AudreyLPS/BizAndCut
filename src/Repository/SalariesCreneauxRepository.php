<?php

namespace App\Repository;

use App\Entity\SalariesCreneaux;
use App\Entity\Evenements;

use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class SalariesCreneauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalariesCreneaux::class);
    }

    public function allSalariesCreneaux():Query{
        $results = $this->createQueryBuilder('salarie_creneaux')
        ->select    (  /*'evenements.id', */  'salarie_creneaux.evenementId', 'salarie_creneaux.horairesSalarieCreneau')
        //  ->join      ('salarie_creneaux.evenementId','evenements.id')
        ->getQuery();
        dd($results);
        return $results;
    }
}
