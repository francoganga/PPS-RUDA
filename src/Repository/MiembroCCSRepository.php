<?php

namespace App\Repository;

use App\Entity\MiembroCCS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MiembroCCS|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroCCS|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroCCS[]    findAll()
 * @method MiembroCCS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroCCSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiembroCCS::class);
    }

    // /**
    //  * @return MiembroCCS[] Returns an array of MiembroCCS objects
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
    public function findOneBySomeField($value): ?MiembroCCS
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
