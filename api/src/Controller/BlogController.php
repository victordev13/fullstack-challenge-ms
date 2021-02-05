<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     * @return Response
     */
    public function index(): Response
    {
        $posts =  $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        return $this->json($posts);
    }

    /**
     * @Route("/post/{slug}", name="post")
     * @return Response
     */
    public function post(string $slug): Response
    {
        return $this->json([]);
    }
}