<?php

namespace App\Repository;

use App\Entity\CandidatLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CandidatLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CandidatLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CandidatLanguage[]    findAll()
 * @method CandidatLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CandidatLanguage::class);
    }

    // /**
    //  * @return CandidatLanguage[] Returns an array of CandidatLanguage objects
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
    public function findOneBySomeField($value): ?CandidatLanguage
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
