<?php

namespace App\Repository;

use App\Entity\ExpPro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExpPro|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpPro|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpPro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpProRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExpPro::class);
    }

    public function findAll()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.date', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }





    // /**
    //  * @return ExpPro[] Returns an array of ExpPro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExpPro
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
