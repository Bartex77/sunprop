<?php

namespace App\Repository;

use App\Entity\PropertyFeature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PropertyFeature|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertyFeature|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertyFeature[]    findAll()
 * @method PropertyFeature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyFeaturesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PropertyFeature::class);
    }

    // /**
    //  * @return PropertyFeature[] Returns an array of PropertyFeature objects
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
    public function findOneBySomeField($value): ?PropertyFeature
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
