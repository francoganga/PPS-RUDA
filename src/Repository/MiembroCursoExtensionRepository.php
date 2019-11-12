<?php

namespace App\Repository;

use App\Entity\MiembroCursoExtension;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MiembroCursoExtension|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroCursoExtension|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroCursoExtension[]    findAll()
 * @method MiembroCursoExtension[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroCursoExtensionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiembroCursoExtension::class);
    }

    // /**
    //  * @return MiembroCursoExtension[] Returns an array of MiembroCursoExtension objects
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
    public function findOneBySomeField($value): ?MiembroCursoExtension
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
