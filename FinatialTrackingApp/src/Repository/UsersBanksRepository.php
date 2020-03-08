<?php

namespace App\Repository;

use App\Entity\UsersBanks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UsersBanks|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersBanks|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersBanks[]    findAll()
 * @method UsersBanks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersBanksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersBanks::class);
    }

    // /**
    //  * @return UsersBanks[] Returns an array of UsersBanks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsersBanks
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
