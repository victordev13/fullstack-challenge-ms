<?php

namespace App\Repository;

use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

class AuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('a')
            ->getQuery()
            ->getResult();
    }

     /**
     * @param int $id
     * @return array
     */
    public function findById(int $id): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }
}