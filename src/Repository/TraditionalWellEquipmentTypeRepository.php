<?php

namespace App\Repository;

use App\Entity\TraditionalWellEquipmentType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TraditionalWellEquipmentType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TraditionalWellEquipmentType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TraditionalWellEquipmentType[]    findAll()
 * @method TraditionalWellEquipmentType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraditionalWellEquipmentTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TraditionalWellEquipmentType::class);
    }

    // /**
    //  * @return TraditionalWellEquipmentType[] Returns an array of TraditionalWellEquipmentType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TraditionalWellEquipmentType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
