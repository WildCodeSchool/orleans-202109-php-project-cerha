<?php

namespace App\Repository;

use App\Entity\CompanyComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyComment[]    findAll()
 * @method CompanyComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyComment::class);
    }

    // /**
    //  * @return CompanyComment[] Returns an array of CompanyComment objects
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
    public function findOneBySomeField($value): ?CompanyComment
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
