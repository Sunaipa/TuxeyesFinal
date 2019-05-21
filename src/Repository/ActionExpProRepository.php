<?php

namespace App\Repository;

use App\Entity\ActionExpPro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActionExpPro|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActionExpPro|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActionExpPro[]    findAll()
 * @method ActionExpPro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionExpProRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActionExpPro::class);
    }

    // /**
    //  * @return ActionExpPro[] Returns an array of ActionExpPro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActionExpPro
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
