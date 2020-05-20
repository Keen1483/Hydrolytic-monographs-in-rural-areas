<?php

namespace App\Repository;

use App\Entity\DrillingPmh;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DrillingPmh|null find($id, $lockMode = null, $lockVersion = null)
 * @method DrillingPmh|null findOneBy(array $criteria, array $orderBy = null)
 * @method DrillingPmh[]    findAll()
 * @method DrillingPmh[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrillingPmhRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DrillingPmh::class);
    }

    // /**
    //  * @return DrillingPmh[] Returns an array of DrillingPmh objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DrillingPmh
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
