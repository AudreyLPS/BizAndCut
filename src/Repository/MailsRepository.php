<?php

namespace App\Repository;

use App\Entity\Mails;
use Doctrine\ORM\Query;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Mails|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mails|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mails[]    findAll()
 * @method Mails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class MailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mails::class);
    }

}
