<?php

namespace App\Repository;

use App\Entity\AdOwner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdOwner|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdOwner|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdOwner[]    findAll()
 * @method AdOwner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdOwnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdOwner::class);
    }

    // /**
    //  * @return AdOwner[] Returns an array of AdOwner objects
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
    public function findOneBySomeField($value): ?AdOwner
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
