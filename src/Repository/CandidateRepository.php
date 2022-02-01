<?php

namespace App\Repository;

use App\Entity\Candidate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidate[]    findAll()
 * @method Candidate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidate::class);
    }

    // /**
    //  * @return Candidate[] Returns an array of Candidate objects
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
    public function findOneBySomeField($value): ?Candidate
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllByName(): array
    {
        /**
         * @var array
         */
        return $this->createQueryBuilder('c')
        ->join('c.user', 'u')
        ->orderBy('u.lastname', 'ASC')
        ->addOrderBy('u.firstname', 'ASC')
        ->getQuery()
        ->getResult();
    }

    public function findByNameOrReference(string $data): array
    {
        $qb = $this->createQueryBuilder('c');
        $qb->join('c.user', 'u')
        ->where(
            $qb->expr()->concat('u.lastname', $qb->expr()->concat($qb->expr()->literal(' '), 'u.firstname')) .
            'LIKE :data'
        )
        ->orWhere(
            $qb->expr()->concat('u.firstname', $qb->expr()->concat($qb->expr()->literal(' '), 'u.lastname')) .
            'LIKE :data'
        )
        ->orWhere('u.reference LIKE :data')
        ->setParameter('data', '%' . $data . '%')
        ->orderBy('u.lastname', 'ASC')
        ->addOrderBy('u.firstname', 'ASC');

        /** @var array */
        return $qb->getQuery()->getResult();
    }

    public function findAllASC(): array
    {
        /** @var array */
        return $this->createQueryBuilder('c')
        ->join('c.user', 'u')
        ->orderBy('u.lastname', 'ASC')
        ->addOrderBy('u.firstname', 'ASC')
        ->getQuery()
        ->getResult();
    }
}
