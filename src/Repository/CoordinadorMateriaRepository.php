<?php

namespace App\Repository;

use App\Entity\CoordinadorMateria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoordinadorMateria|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoordinadorMateria|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoordinadorMateria[]    findAll()
 * @method CoordinadorMateria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoordinadorMateriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoordinadorMateria::class);
    }

    // /**
    //  * @return CoordinadorMateria[] Returns an array of CoordinadorMateria objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoordinadorMateria
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
