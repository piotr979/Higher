<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
class FrontController extends AbstractController
{
    #[Route('/', name: 'front')]
    public function index(): Response
    {

        return $this->render('front/index.html.twig');
    }
    #[Route('/comment', name: 'comment')]
    public function comment()
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $user->setEmail("wp@wp.pl");
        $user->setPassword("123456");
        $user->setFirstName("Edi");
        $em->persist($user);
        $em->flush();
        return new Response("success");




    }
}
