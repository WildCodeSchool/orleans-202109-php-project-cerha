<?php

namespace App\Repository;

use App\Entity\Softskill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Softskill|null find($id, $lockMode = null, $lockVersion = null)
 * @method Softskill|null findOneBy(array $criteria, array $orderBy = null)
 * @method Softskill[]    findAll()
 * @method Softskill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoftskillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Softskill::class);
    }

    // /**
    //  * @return Softskill[] Returns an array of Softskill objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Softskill
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
