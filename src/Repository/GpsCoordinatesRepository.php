<?php

namespace App\Repository;

use App\Entity\GpsCoordinates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GpsCoordinates|null find($id, $lockMode = null, $lockVersion = null)
 * @method GpsCoordinates|null findOneBy(array $criteria, array $orderBy = null)
 * @method GpsCoordinates[]    findAll()
 * @method GpsCoordinates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GpsCoordinatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GpsCoordinates::class);
    }

    // /**
    //  * @return GpsCoordinates[] Returns an array of GpsCoordinates objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GpsCoordinates
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
