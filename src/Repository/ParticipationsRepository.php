<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Participations;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Participations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participations[]    findAll()
 * @method Participations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ParticipationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participations::class);
    }

    
}
