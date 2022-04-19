<?php

namespace App\Repository;

use App\Entity\LiaisonPeriodeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LiaisonPeriodeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LiaisonPeriodeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LiaisonPeriodeType[]    findAll()
 * @method LiaisonPeriodeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiaisonPeriodeTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LiaisonPeriodeType::class);
    }

    // /**
    //  * @return LiaisonPeriodeType[] Returns an array of LiaisonPeriodeType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LiaisonPeriodeType
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
