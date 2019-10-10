<?php

namespace App\Repository;

use App\Entity\MiembroProyectoRol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MiembroProyectoRol|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroProyectoRol|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroProyectoRol[]    findAll()
 * @method MiembroProyectoRol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroProyectoRolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MiembroProyectoRol::class);
    }

    // /**
    //  * @return MiembroProyectoRol[] Returns an array of MiembroProyectoRol objects
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
    public function findOneBySomeField($value): ?MiembroProyectoRol
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
