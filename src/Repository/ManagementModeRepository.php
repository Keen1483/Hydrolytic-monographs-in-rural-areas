<?php

namespace App\Repository;

use App\Entity\ManagementMode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ManagementMode|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagementMode|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagementMode[]    findAll()
 * @method ManagementMode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagementModeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagementMode::class);
    }

    // /**
    //  * @return ManagementMode[] Returns an array of ManagementMode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ManagementMode
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
