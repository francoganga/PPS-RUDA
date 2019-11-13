<?php

namespace App\Repository;

use App\Entity\MiembroVoluntariado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MiembroVoluntariado|null find($id, $lockMode = null, $lockVersion = null)
 * @method MiembroVoluntariado|null findOneBy(array $criteria, array $orderBy = null)
 * @method MiembroVoluntariado[]    findAll()
 * @method MiembroVoluntariado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiembroVoluntariadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MiembroVoluntariado::class);
    }

    // /**
    //  * @return MiembroVoluntariado[] Returns an array of MiembroVoluntariado objects
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
    public function findOneBySomeField($value): ?MiembroVoluntariado
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
