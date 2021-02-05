<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/a", name="blog")
     * @return Response
     */
    public function index(): Response
    {
        $response = new Response(json_encode(["message" => "Hello World!"]));
        $response->header->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/", name="post")
     * @return Response
     */
    public function post(): Response
    {
        $response = new Response();
        $response->header->set('Content-Type', 'application/json');
        return $response;
    }
}