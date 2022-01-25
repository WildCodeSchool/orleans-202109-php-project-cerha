<?php

namespace App\Repository;

use App\Entity\CandidateComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CandidateComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method CandidateComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method CandidateComment[]    findAll()
 * @method CandidateComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CandidateComment::class);
    }

    // /**
    //  * @return CandidateComment[] Returns an array of CandidateComment objects
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
    public function findOneBySomeField($value): ?CandidateComment
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
