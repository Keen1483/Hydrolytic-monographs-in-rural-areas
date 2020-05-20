<?php

namespace App\Repository;

use App\Entity\WaterTraitmentAnalysis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WaterTraitmentAnalysis|null find($id, $lockMode = null, $lockVersion = null)
 * @method WaterTraitmentAnalysis|null findOneBy(array $criteria, array $orderBy = null)
 * @method WaterTraitmentAnalysis[]    findAll()
 * @method WaterTraitmentAnalysis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaterTraitmentAnalysisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WaterTraitmentAnalysis::class);
    }

    // /**
    //  * @return WaterTraitmentAnalysis[] Returns an array of WaterTraitmentAnalysis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WaterTraitmentAnalysis
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
