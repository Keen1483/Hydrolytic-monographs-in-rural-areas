<?php

namespace App\Repository;

use App\Entity\EquipmentAep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipmentAep|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentAep|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentAep[]    findAll()
 * @method EquipmentAep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentAepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentAep::class);
    }

    // /**
    //  * @return EquipmentAep[] Returns an array of EquipmentAep objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipmentAep
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
