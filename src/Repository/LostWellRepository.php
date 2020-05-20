<?php

namespace App\Repository;

use App\Entity\LostWell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LostWell|null find($id, $lockMode = null, $lockVersion = null)
 * @method LostWell|null findOneBy(array $criteria, array $orderBy = null)
 * @method LostWell[]    findAll()
 * @method LostWell[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LostWellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LostWell::class);
    }

    // /**
    //  * @return LostWell[] Returns an array of LostWell objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LostWell
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
