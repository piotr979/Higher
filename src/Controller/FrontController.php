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
        $articlesRepo = $this->getDoctrine()->getRepository(Article::class);
        $bestUsers = $articlesRepo->getAuthorsByNumberOfArticles();
        $mostPopularTags = $articlesRepo->getMostPopularTags();
        $latestArticles = $articlesRepo->getLatestArticles();
        return $this->render('front/index.html.twig', [
            'bestUsers' => $bestUsers,
            'mostPopularTags' => $mostPopularTags,
            'latestArticles' => $latestArticles

        ]);
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
          $user->setBio($userUpdatedData['Bio']);
          $em->persist($user);
          $em->flush();
        } //: VALIDATION, UPDATING ENDS HERE

        /* Get user data to display */
        $user_id = $user->getId();
        $userArticles = $user->getArticles()->getValues();
      
        $photoUrl = $user->getPhotoUrl();
        return $this->render('front/profile.html.twig', [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'photo_url' => $photoUrl,
            'articles' => $userArticles,
            'bio' => $user->getBio(),
            'userForm' => $userForm->createView()

        ]);
    }

     /** ****************************
     *  FOOTER TAG LINKS ROUTE 
     ******************************/
    public function getMostPopularTags()
    {
        $articlesRepo = $this->getDoctrine()->getRepository(Article::class);
        $tags = $articlesRepo->getMostPopularTags();
        return $this->render('front/components/footer-tag-links.html.twig', [
            'tags' => $tags
        ]);
    }
}
