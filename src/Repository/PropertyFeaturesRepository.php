<?php

namespace App\Repository;

use App\Entity\PropertyFeatures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PropertyFeatures|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyFeatures|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyFeatures[]    findAll()
 * @method PropertyFeatures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyFeaturesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PropertyFeatures::class);
    }

    // /**
    //  * @return PropertyFeatures[] Returns an array of PropertyFeatures objects
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
    public function findOneBySomeField($value): ?PropertyFeatures
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
