<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
class FrontController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(): Response
    {

        return $this->render('front/index.html.twig');
    }
    
    #[Route('/profile', name:'profile')]
    public function userpanel()
    {
        $user_id = $this->getUser()->getId();
        $user_first_name = $this->getUser()->getFirstName();
        $user_last_name = $this->getUser()->getLastName();
        $user_articles = $this->getUser()->getArticles()->getValues();
        
        dump($user_articles);
        return $this->render('front/profile.html.twig', [
            'first_name' => $user_first_name,
            'last_name' => $user_last_name,
            'articles' => $user_articles
        ]);
    }

    #[Route('/articles', name: 'articles')]
    public function articles()
    {
        return new Response("articles");
    }

}
