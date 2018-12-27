<?php

namespace App\Repository;

use App\Entity\PriceInMonth;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PriceInMonth|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceInMonth|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceInMonth[]    findAll()
 * @method PriceInMonth[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceInMonthRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PriceInMonth::class);
    }

    // /**
    //  * @return PriceInMonth[] Returns an array of PriceInMonth objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriceInMonth
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
