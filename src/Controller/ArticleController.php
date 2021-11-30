<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ArticleFormType;

#[Route('article')]

class ArticleController extends AbstractController
{
    /** ****************************
     *  ARTICLES LIST ROUTE 
     ******************************/

    #[Route('/articles', name: 'articles')]
    public function articles()
    {
        return new Response("articles");
    }

     /** ****************************
     *  NEW ARTICLE ROUTE 
     ******************************/

    #[Route('/article-new', name: 'article-new')]
    public function articleNew(Request $request)
    {
        $articleForm = $this->createForm(ArticleFormType::class);
        $articleForm->handleRequest($request);

        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
        
           $em = $this->getDoctrine()->getManager();
           $formData = $articleForm->getData();
          // dump($formData);exit;
           $article = new Article();
           $article->setUser($this->getUser());
           $article->setTitle($formData->getTitle());
           $article->setContent($formData->getContent());
           $article->setColor($formData->getColor());
           $tagsList = $formData->getTagsId();
           
           foreach ($tagsList as $tag) {
               $article->addTagsId($tag);
           }
         //  $article->addTagsId($formData->getTagsId());
           $coverImage = $articleForm->get('image_url')->getData();
           if ($coverImage) {
              $pathForUploads = $this->getParameter('covers_dir');
              try {
              $originalFilename = pathInfo($coverImage->getClientOriginalName(), PATHINFO_FILENAME);
              $filename = $originalFilename . md5(uniqid()) . '.' . $coverImage->guessExtension();
              $coverImage->move($pathForUploads, $filename);
              
              $article->setImageUrl($pathForUploads . '/' . $filename);
              } catch (FileException $e) {
                echo "error";exit;
              }
           }
           $em->persist($article);
           $em->flush();
           return $this->redirect($this->generateUrl('profile'));
           
        }

        return $this->render('front/article-new.html.twig', [
            'articleForm' => $articleForm->createView()
        ]);
    }

     /** ****************************
     *  EDIT EXISITING ARTICLE ROUTE 
     ******************************/

     #[Route('/article-edit/{id}', name: "article-edit")]
     public function editArticle(int $id) {

        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);
        $articleForm = $this->createForm(ArticleFormType::class);
        return $this->render('front/article-edit.html.twig', [
            'article' => $article,
            'articleForm' => $articleForm->createView()
        ]);
     }
}
