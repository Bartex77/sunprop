<?php

namespace App\Repository;

use App\Entity\AmenityTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AmenityTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AmenityTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AmenityTranslation[]    findAll()
 * @method AmenityTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmenityTranslationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AmenityTranslation::class);
    }

    // /**
    //  * @return Amenity[] Returns an array of Amenity objects
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
    public function findOneBySomeField($value): ?Amenity
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
