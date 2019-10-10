<?php

namespace App\Repository;

use App\Entity\ProyectoMiembro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProyectoMiembro|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProyectoMiembro|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProyectoMiembro[]    findAll()
 * @method ProyectoMiembro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProyectoMiembroRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProyectoMiembro::class);
    }

    // /**
    //  * @return ProyectoMiembro[] Returns an array of ProyectoMiembro objects
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
    public function findOneBySomeField($value): ?ProyectoMiembro
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
