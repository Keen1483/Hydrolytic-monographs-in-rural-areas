<?php

namespace App\Repository;

use App\Entity\ImproveSourceEquipmentType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImproveSourceEquipmentType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImproveSourceEquipmentType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImproveSourceEquipmentType[]    findAll()
 * @method ImproveSourceEquipmentType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImproveSourceEquipmentTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImproveSourceEquipmentType::class);
    }

    // /**
    //  * @return ImproveSourceEquipmentType[] Returns an array of ImproveSourceEquipmentType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImproveSourceEquipmentType
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
