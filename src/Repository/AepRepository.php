<?php

namespace App\Repository;

use App\Entity\Aep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aep|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aep|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aep[]    findAll()
 * @method Aep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aep::class);
    }

    // /**
    //  * @return Aep[] Returns an array of Aep objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aep
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
