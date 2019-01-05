<?php

namespace App\Repository;

use App\Entity\Propertytype;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Propertytype|null find($id, $lockMode = null, $lockVersion = null)
 * @method Propertytype|null findOneBy(array $criteria, array $orderBy = null)
 * @method Propertytype[]    findAll()
 * @method Propertytype[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertytypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Propertytype::class);
    }

    // /**
    //  * @return Propertytype[] Returns an array of Propertytype objects
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
    public function findOneBySomeField($value): ?Propertytype
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
