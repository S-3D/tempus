<?php

namespace App\Repository;

use App\Entity\Tempus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tempus>
 *
 * @method Tempus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tempus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tempus[]    findAll()
 * @method Tempus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TempusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tempus::class);
    }

//    /**
//     * @return Tempus[] Returns an array of Tempus objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tempus
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
