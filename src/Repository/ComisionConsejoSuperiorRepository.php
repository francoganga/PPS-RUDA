<?php

namespace App\Repository;

use App\Entity\ComisionConsejoSuperior;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ComisionConsejoSuperior|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComisionConsejoSuperior|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComisionConsejoSuperior[]    findAll()
 * @method ComisionConsejoSuperior[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComisionConsejoSuperiorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComisionConsejoSuperior::class);
    }

    // /**
    //  * @return ComisionConsejoSuperior[] Returns an array of ComisionConsejoSuperior objects
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
    public function findOneBySomeField($value): ?ComisionConsejoSuperior
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
