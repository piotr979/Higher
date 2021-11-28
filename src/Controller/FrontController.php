<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Tag;
use App\Form\ArticleFormType;
use App\Form\ProfileFormType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
        $user = $this->getUser();

        $userForm = $this->createForm(ProfileFormType::class);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {

           /* get Manager and User data  */
          $em = $this->getDoctrine()->getManager();
          $userUpdatedData = $userForm->getData();
        
          /* Updating user photo image */
          $file = $userForm->get('photo')->getData();
          if ($file) {
              $originalName = pathInfo($file->getClientOriginalName(), PATHINFO_FILENAME);
              $fileName = $originalName . md5(uniqid()) . '.' . $file->guessExtension();
              try {
                
             /* Uploading photo, updating user photo url */
              $pathForUploads = $this->getParameter('uploads_dir');  
              $file->move($pathForUploads, $fileName);
              $user->setPhotoUrl($pathForUploads . '/' . $fileName);
              } catch ( FileException $e) {
                    // TODO: Handle exception
              }
          }
         /* Updating remaining user details */
          $user->setFirstName($userUpdatedData['first_name']);

          if ($userUpdatedData['last_name'] != '') {
              $user->setLastName($userUpdatedData['last_name']);
          }
          $em->persist($user);
          $em->flush();
        } //: VALIDATION, UPDATING ENDS HERE

        /* Get user data to display */
        $user_id = $user->getId();
        $userArticles = $user->getArticles()->getValues();
      
        $photoUrl = $user->getPhotoUrl();
        return $this->render('front/profile.html.twig', [
            'first_name' => $this->getUser()->getFirstName(),
            'last_name' => $this->getUser()->getLastName(),
            'photo_url' => $photoUrl,
            'articles' => $userArticles,
            'userForm' => $userForm->createView()

        ]);
    }

     /** ****************************
     *  ARTICLES LIST ROUTE 
     ******************************/

    #[Route('/articles', name: 'articles')]
    public function articles()
    {
        return new Response("articles");
    }

     /** ****************************
     *  NEW USER ARTICLE ROUTE 
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
           if ($formData->getImageUrl()) {
               $article->setImageUrl($formData->getImageUrl());
           } 
           
           $em->persist($article);
           $em->flush();
           return $this->redirect($this->generateUrl('profile'));
           
        }

        return $this->render('front/article-new.html.twig', [
            'articleForm' => $articleForm->createView()
        ]);
    }
}
