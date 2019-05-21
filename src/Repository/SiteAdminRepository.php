<?php

namespace App\Repository;

use App\Entity\SiteAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SiteAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiteAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiteAdmin[]    findAll()
 * @method SiteAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiteAdminRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SiteAdmin::class);
    }

    // /**
    //  * @return SiteAdmin[] Returns an array of SiteAdmin objects
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
    public function findOneBySomeField($value): ?SiteAdmin
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
