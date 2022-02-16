<?php

namespace App\Repository;

use App\Entity\Referido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Referido|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referido|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referido[]    findAll()
 * @method Referido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Referido::class);
    }

    // /**
    //  * @return Referido[] Returns an array of Referido objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Referido
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
