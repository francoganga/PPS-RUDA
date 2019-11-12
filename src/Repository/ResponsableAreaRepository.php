<?php

namespace App\Repository;

use App\Entity\ResponsableArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResponsableArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsableArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsableArea[]    findAll()
 * @method ResponsableArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsableAreaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponsableArea::class);
    }

    // /**
    //  * @return ResponsableArea[] Returns an array of ResponsableArea objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResponsableArea
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
