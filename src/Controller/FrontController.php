<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\ProfileFormType;
use Symfony\Component\HttpFoundation\Request;


class FrontController extends AbstractController
{

    /** ****************************
     *  HOME PAGE ROUTE 
     ******************************/

    #[Route('/', name: 'main')]
    public function index(): Response
    {

        return $this->render('front/index.html.twig');
    }
    
     /** ****************************
     *  PROFILE PAGE ROUTE 
     ******************************/

    #[Route('/profile', name:'profile')]
    public function userpanel(Request $request)
    {
        $userForm = $this->createForm(ProfileFormType::class);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {

          $em = $this->getDoctrine()->getManager();

          $user = $this->getUser();
          $userUpdatedData = $userForm->getData();
          $user->setFirstName($userUpdatedData['first_name']);

          if ($userUpdatedData['last_name'] != '') {
              $user->setLastName($userUpdatedData['last_name']);
          }
          $em->persist($user);
          $em->flush();
        }

        $user_id = $this->getUser()->getId();
        $user_articles = $this->getUser()->getArticles()->getValues();
        
        dump($user_articles);
        return $this->render('front/profile.html.twig', [
            'first_name' => $this->getUser()->getFirstName(),
            'last_name' => $this->getUser()->getLastName(),
            'articles' => $user_articles,
            'userForm' => $userForm->createView()
          
        ]);
    }

     /** ****************************
     *  ARTICLES ROUTE 
     ******************************/

    #[Route('/articles', name: 'articles')]
    public function articles()
    {
        return new Response("articles");
    }

     /** ****************************
     *  HOME PAGE ROUTE 
     ******************************/
    #[Route('/article-new', name: 'article-new')]
    public function articleNew()
    {
        return $this->render('front/article-new.html.twig');
    }
}
