<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
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
     * @Route("/posts", name="posts_list")
     * @return Response
     */
    public function postsList(): Response
    {
        $posts =  $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();
            
        $posts = ["lengh"=>sizeof($posts),"posts"=>$posts];
        
        return $this->json($posts);
    }

    /**
     * @Route("/posts/{slug}",name="posts_find", methods={"GET"})
     * @param string $slug
     * @return Response
     */
    public function postsFind(string $slug): Response
    {
        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findOneBySlug($slug);

        if(sizeof($post) === 0){
            return $this->json(["message"=>"Post not found!"], Response::HTTP_NOT_FOUND);
        }
        
        return $this->json($post);
    }

     /**
     * @Route("/posts/create", name="posts_create", methods={"POST","HEAD"})
     * @param Request $request
     * @return Response
     */
    public function postsCreate(Request $request): Response
    {
        $postFormData = json_decode($request->getContent(), true);

        if(sizeof($postFormData) === 0){
            return $this->json(["message"=>"no fields informed"], Response::HTTP_BAD_REQUEST);
        }
        try{
            $createNewPost = new Post();
            $createNewPost->setTitle($postFormData["title"]);
            $createNewPost->setContentPreview($postFormData["content_preview"]);
            $createNewPost->setContent($postFormData["content"]);
            $createNewPost->setCategory($postFormData["category"]);
            $createNewPost->setSlug($postFormData["slug"]);
            $createNewPost->setCoverImageUrl($postFormData["cover_image_url"]);
            $createNewPost->setCreatedAt(new DateTime);
            
            $author = new Author();
            $author->setId(intval($postFormData["author_id"]));

            $authorExists = $this->getDoctrine()->getRepository(Author::class)->findById(intval($author->getId()));

            if(sizeof($authorExists) === 0){
                return $this->json(["message"=>"Author not found"], Response::HTTP_NOT_FOUND);
            }
            
            $createNewPost->setAuthorId($author);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->merge($createNewPost);
            $entityManager->flush();
          
            return $this->json(["success"=>true]);

        } catch(\TypeError $e){
            return $this->json(["error"=>"All fields required"], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Route("/authors/create", name="author_create", methods={"POST","HEAD"})
     * @param Request $request
     * @return Response
     */
    public function authorCreate(Request $request): Response
    {
        $postFormData = json_decode($request->getContent(), true);
        
        if(sizeof($postFormData) === 0){
            return $this->json(["message"=>"no fields informed"], Response::HTTP_BAD_REQUEST);
        }
        try{
            $createNewAuthor = new Author();
            $createNewAuthor->setFullname($postFormData["fullname"]);
            $createNewAuthor->setUsername($postFormData["username"]);
                        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->merge($createNewAuthor);
            $entityManager->flush();
            
            return $this->json(["success"=>true]);
          
        } catch(\Exception $e){
            return $this->json(["error"=>"All fields required"], Response::HTTP_BAD_REQUEST);
        }
    }
}