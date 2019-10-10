<?php

namespace App\Repository;

use App\Entity\MiembroProyecto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MiembroProyecto|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroProyecto|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroProyecto[]    findAll()
 * @method MiembroProyecto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroProyectoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MiembroProyecto::class);
    }

    // /**
    //  * @return MiembroProyecto[] Returns an array of MiembroProyecto objects
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
    public function findOneBySomeField($value): ?MiembroProyecto
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
