<?php

namespace App\Repository;

use App\Entity\Looks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Looks>
 *
 * @method Looks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Looks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Looks[]    findAll()
 * @method Looks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LooksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Looks::class);
    }

//    /**
//     * @return Looks[] Returns an array of Looks objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Looks
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
