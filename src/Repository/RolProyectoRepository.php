<?php

namespace App\Repository;

use App\Entity\RolProyecto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RolProyecto|null find($id, $lockMode = null, $lockVersion = null)
 * @method RolProyecto|null findOneBy(array $criteria, array $orderBy = null)
 * @method RolProyecto[]    findAll()
 * @method RolProyecto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RolProyectoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RolProyecto::class);
    }

    // /**
    //  * @return RolProyecto[] Returns an array of RolProyecto objects
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
    public function findOneBySomeField($value): ?RolProyecto
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
