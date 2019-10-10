<?php

namespace App\Repository;

use App\Entity\ProyectoExtension;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProyectoExtension|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProyectoExtension|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProyectoExtension[]    findAll()
 * @method ProyectoExtension[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProyectoExtensionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProyectoExtension::class);
    }

    // /**
    //  * @return ProyectoExtension[] Returns an array of ProyectoExtension objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProyectoExtension
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
