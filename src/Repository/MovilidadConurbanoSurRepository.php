<?php

namespace App\Repository;

use App\Entity\MovilidadConurbanoSur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MovilidadConurbanoSur|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovilidadConurbanoSur|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovilidadConurbanoSur[]    findAll()
 * @method MovilidadConurbanoSur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovilidadConurbanoSurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovilidadConurbanoSur::class);
    }

    // /**
    //  * @return MovilidadConurbanoSur[] Returns an array of MovilidadConurbanoSur objects
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
    public function findOneBySomeField($value): ?MovilidadConurbanoSur
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
