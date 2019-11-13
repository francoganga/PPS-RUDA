<?php

namespace App\Repository;

use App\Entity\MiembroPrograma;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MiembroPrograma|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroPrograma|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroPrograma[]    findAll()
 * @method MiembroPrograma[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroProgramaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiembroPrograma::class);
    }

    // /**
    //  * @return MiembroPrograma[] Returns an array of MiembroPrograma objects
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
    public function findOneBySomeField($value): ?MiembroPrograma
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
