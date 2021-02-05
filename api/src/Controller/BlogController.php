<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 * @package App\Controller
 * @Route("/api")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return new Response('API running!');
    }

    /**
     * @Route("/posts", name="posts")
     * @return Response
     */
    public function posts(): Response
    {
        $posts =  $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        return $this->json($posts);
    }

    /**
     * @Route("/posts/{slug}", name="post")
     * @param string $slug
     * @return Response
     */
    public function post(string $slug): Response
    {
        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findOneBySlug($slug);
        return $this->json($post);
    }

    /**
     * @Route("/post/create", name="create_post", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent());
        return new Response(json_encode($data));
//        return $this->json("");
    }
}