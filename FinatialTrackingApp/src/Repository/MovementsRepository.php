<?php

namespace App\Repository;

use App\Entity\Movements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Movements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movements[]    findAll()
 * @method Movements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movements::class);
    }

    // /**
    //  * @return Movements[] Returns an array of Movements objects
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
    public function findOneBySomeField($value): ?Movements
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
