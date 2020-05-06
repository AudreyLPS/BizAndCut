<?php

namespace App\Repository;

use App\Entity\Entreprises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Insc_entre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Insc_entre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Insc_entre[]    findAll()
 * @method Insc_entre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Insc_entreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Insc_entre::class);
    }

	// public function test():Query
	// {
	// 	$results = $this->createQueryBuilder('discovery')
	// 		->select('COUNT(discovery.id), country.name')
	// 		->join('discovery.country', 'country')
	// 		->groupBy('country.name')

	// 		->getQuery()
	// 	;

	// 	return $results;
 //    }

    // public function find4():Query
    // {
    // 	$results = $this->createQueryBuilder('discovery')
    // 	->select('image')
    // 	->setMaxResults(4)

    // 	->getQuery()
    // 	;

    // 	return $results;
    // }
}