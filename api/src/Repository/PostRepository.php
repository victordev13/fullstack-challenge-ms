<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * @return Post[]
     */
    public function findAll():array
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.author_id','a','a.id=p.author_id_id')

            ->select('
                p.title,
                p.content_preview,
                p.content,
                p.cover_image_url,
                p.category,
                p.slug,
                p.category,
                a.username as author,
                p.created_at
            ')
            ->orderBy('p.created_at', 'DESC')
            ->getQuery()
            ->getResult();
    }


    /**
     * @param $slug
     * @return array
     */
    public function findOneBySlug($slug): array
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.author_id','a','a.id=p.author_id_id')
            ->select('
                p.title,
                p.content_preview,
                p.content,
                p.cover_image_url,
                p.category,
                p.slug,
                p.category,
                a.username as author,
                p.created_at
            ')
            ->where('p.slug = :slug')
            ->setParameter('slug', $slug)
            ->orderBy('p.created_at','DESC')
            ->getQuery()
            ->getResult();
    }

    public function create(Post $post)
    {
        try {
            $post = null;
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
        } catch (Exception $e) {
        }
    }
}