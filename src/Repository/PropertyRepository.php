<?php

namespace App\Repository;

use App\Entity\Property;
use App\Entity\Town;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\Expr;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Property::class);
    }

    public function fetchSearchResults($searchQuery) {
        $qb = $this->createQueryBuilder('p')
            ->innerJoin(Town::class, 't', Expr\Join::WITH, 't = p.town')
            ->where('p.status = :status')
            ->andWhere('p.constructionType = :constructionType')
            ->andWhere('p.bathrooms >= :bathrooms')
            ->setParameter('status', 1)
            ->setParameter('constructionType', $searchQuery['constructionType'])
            ->setParameter('bathrooms', $searchQuery['bathrooms'])
        ;

        if (!is_null($searchQuery['bedrooms'])) {
            $qb
                ->andWhere('p.bedrooms >= :bedrooms')
                ->setParameter('bedrooms', $searchQuery['bedrooms']);
        }

        if (!($searchQuery['town']->isEmpty())) {
            $qb
                ->andWhere('p.town IN (:town)')
                ->setParameter('town', $searchQuery['town']);
        } elseif (!($searchQuery['province']->isEmpty())) {
            $qb
                ->andWhere('t.province IN (:province)')
                ->setParameter('province', $searchQuery['province'])
            ;
        }

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Property[] Returns an array of Property objects
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
    public function findOneBySomeField($value): ?Property
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
