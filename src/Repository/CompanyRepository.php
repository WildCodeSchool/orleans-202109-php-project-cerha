<?php

namespace App\Repository;

use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    // /**
    //  * @return Company[] Returns an array of Company objects
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
    public function findOneBySomeField($value): ?Company
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findBySiretOrName(string $search): array
    {
        /** @var array */
        return $this->createQueryBuilder('c')
        ->join('c.user', 'u')
        ->where('c.siret LIKE :siret')
        ->orWhere('c.denomination LIKE :denomination')
        ->setParameter('siret', $search)
        ->setParameter('denomination', $search)
        ->getQuery()
        ->getResult();
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
