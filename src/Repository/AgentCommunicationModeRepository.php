<?php

namespace App\Repository;

use App\Entity\AgentCommunicationMode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgentCommunicationMode|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentCommunicationMode|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentCommunicationMode[]    findAll()
 * @method AgentCommunicationMode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentCommunicationModeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentCommunicationMode::class);
    }

    // /**
    //  * @return AgentCommunicationMode[] Returns an array of AgentCommunicationMode objects
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
    public function findOneBySomeField($value): ?AgentCommunicationMode
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
