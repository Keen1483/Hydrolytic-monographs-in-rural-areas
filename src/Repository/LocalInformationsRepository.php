<?php

namespace App\Repository;

use App\Entity\LocalInformations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocalInformations|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocalInformations|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocalInformations[]    findAll()
 * @method LocalInformations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalInformationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocalInformations::class);
    }

    // /**
    //  * @return LocalInformations[] Returns an array of LocalInformations objects
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
    public function findOneBySomeField($value): ?LocalInformations
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
