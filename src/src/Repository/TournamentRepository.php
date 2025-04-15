<?php

namespace App\Repository;

use App\Entity\Tournament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tournament>
 */
class TournamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tournament::class);
    }


    public function save(Tournament $tournament): void
    {
        $this->getEntityManager()->persist($tournament);
        $this->getEntityManager()->flush();
    }

    public function search(?string $type, ?\DateTimeImmutable $date, ?string $winnerName): array
    {
        $qb = $this->createQueryBuilder('t');

        if ($type) {
            $qb->andWhere('t.type = :type')
                ->setParameter('type', $type)
            ;
        }

        if ($date) {
            $qb->andWhere('t.createdAt >= :date')
                ->setParameter('date', $date)
            ;
        }

        if ($winnerName) {
            $qb->leftJoin('t.winner', 'w')
                ->andWhere('w.name LIKE :winnerName')
                ->setParameter('winnerName', '%'.$winnerName.'%')
            ;
        }

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Tournament[] Returns an array of Tournament objects
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

//    public function findOneBySomeField($value): ?Tournament
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
