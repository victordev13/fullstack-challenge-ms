<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ContactForm;
use DateTime;

/**
 * @Route("/api")
 */
class ContactFormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_form", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $contactFormData = json_decode($request->getContent(), true);

        if(sizeof($contactFormData) === 0){
            return $this->json(["message"=>"no fields informed"], Response::HTTP_BAD_REQUEST);
        }

        try{
            $createNewContactForm = new ContactForm();
            $createNewContactForm->setName($contactFormData["name"]);
            $createNewContactForm->setEmail($contactFormData["email"]);
            $createNewContactForm->setPhone($contactFormData["phone"]);
            $createNewContactForm->setMessage($contactFormData["message"]);
            $createNewContactForm->setCreatedAt(new DateTime);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($createNewContactForm);
            $entityManager->flush();
          
            return $this->json(["success"=>true]);
        } catch(\TypeError $e){
            return $this->json(["error"=>"All fields required"], Response::HTTP_BAD_REQUEST);
        }
    }
}
