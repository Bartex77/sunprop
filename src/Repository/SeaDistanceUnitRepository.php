<?php

namespace App\Repository;

use App\Entity\SeaDistanceUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SeaDistanceUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeaDistanceUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeaDistanceUnit[]    findAll()
 * @method SeaDistanceUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeaDistanceUnitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SeaDistanceUnit::class);
    }

    // /**
    //  * @return SeaDistanceUnit[] Returns an array of SeaDistanceUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SeaDistanceUnit
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
