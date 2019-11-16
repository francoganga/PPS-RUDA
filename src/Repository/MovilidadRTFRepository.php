<?php

namespace App\Repository;

use App\Entity\MovilidadRTF;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MovilidadRTF|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovilidadRTF|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovilidadRTF[]    findAll()
 * @method MovilidadRTF[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovilidadRTFRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovilidadRTF::class);
    }

    // /**
    //  * @return MovilidadRTF[] Returns an array of MovilidadRTF objects
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
    public function findOneBySomeField($value): ?MovilidadRTF
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
