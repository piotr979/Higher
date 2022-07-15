<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\User;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function admin(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/admin/articles/{sorting}/{page}/{authorId}', name: 'admin-articles')]
    public function articles(int $page = 1, $sorting = 'newest', $authorId = '0'): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAllPaginated(
            $page,
            $sorting,
            'notag',
            $authorId,
            ''
        );
        return $this->render('admin/admin-articles.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/admin/comments', name: 'admin-comments')]
    public function comments(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $repo->findAllPaginated(1);
       
        return $this->render('admin/admin-comments.html.twig', [
            'comments' => $comments
        ]);
    }

    #[Route('/admin/users', name: 'admin-users')]
    public function users(): Response
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $users = $repo->findAll();
        return $this->render('admin/admin-users.html.twig', [
            'users' => $users
        ]);
    }



}
