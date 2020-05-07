<?php

namespace App\Repository;

use App\Entity\Devis;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Devis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Devis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Devis[]    findAll()
 * @method Devis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class DevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Devis::class);
    }

    public function allDevis():Query{
        $results = $this->createQueryBuilder('devis')
        ->select    ('devis.numeroDevis', 'devis.nbParticipantsDevis', 'devis.nbHeuresDevis','status.texteDevisStatut')
        ->join      ('devis.devisStatutId','status')
        ->getQuery();
        
        return $results;
    }
}
