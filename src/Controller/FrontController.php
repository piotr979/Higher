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
        $current_user = $this->getUser();
        dump($current_user->getId());
        return $this->render('front/profile.html.twig', [

        ]);
    }

    #[Route('/articles', name: 'articles')]
    public function articles()
    {
        return new Response("articles");
    }

}
