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

    /**
     * Save the tournament enity
     * 
     * @param Tournament $tournament
     * @return void
     */
    public function save(Tournament $tournament): void
    {
        $this->getEntityManager()->persist($tournament);
        $this->getEntityManager()->flush();
    }

    /**
     * Search tournament 
     * 
     * @param ?string $type type of tournament
     * @param ?\DateTimeImmutable $date date of the tournament
     * @param ?string $winnerName name of the winner
     */
    public function search(?string $type, ?\DateTimeImmutable $dateMin, ?string $winnerName): array
    {
        $qb = $this->createQueryBuilder('t');

        if ($type) {
            $qb->andWhere('t.type = :type')
                ->setParameter('type', $type)
            ;
        }

        if ($dateMin) {
            $qb->andWhere('t.createdAt >= :date')
                ->setParameter('date', $dateMin)
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
