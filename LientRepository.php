<?php

namespace App\Repository;

use App\Entity\Lient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lient[]    findAll()
 * @method Lient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lient::class);
    }

    // /**
    //  * @return Lient[] Returns an array of Lient objects
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
    public function findOneBySomeField($value): ?Lient
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
