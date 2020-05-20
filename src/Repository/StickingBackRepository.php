<?php

namespace App\Repository;

use App\Entity\StickingBack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StickingBack|null find($id, $lockMode = null, $lockVersion = null)
 * @method StickingBack|null findOneBy(array $criteria, array $orderBy = null)
 * @method StickingBack[]    findAll()
 * @method StickingBack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StickingBackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StickingBack::class);
    }

    // /**
    //  * @return StickingBack[] Returns an array of StickingBack objects
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
    public function findOneBySomeField($value): ?StickingBack
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
