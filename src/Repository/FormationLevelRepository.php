<?php

namespace App\Repository;

use App\Entity\FormationLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormationLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationLevel[]    findAll()
 * @method FormationLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormationLevel::class);
    }

    // /**
    //  * @return FormationLevel[] Returns an array of FormationLevel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormationLevel
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
