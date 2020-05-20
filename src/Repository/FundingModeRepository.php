<?php

namespace App\Repository;

use App\Entity\FundingMode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FundingMode|null find($id, $lockMode = null, $lockVersion = null)
 * @method FundingMode|null findOneBy(array $criteria, array $orderBy = null)
 * @method FundingMode[]    findAll()
 * @method FundingMode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FundingModeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FundingMode::class);
    }

    // /**
    //  * @return FundingMode[] Returns an array of FundingMode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FundingMode
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
