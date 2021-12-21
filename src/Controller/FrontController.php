<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Tag;
use App\Form\ArticleFormType;
use App\Form\ContactType;
use App\Form\ProfileFormType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

/* My services */
use App\Services\FileHandler;
use App\Services\EMailer;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

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
    public function userpanel(Request $request, FileHandler $fileHandler)
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
         
          /* Using FileHandler service  */
          $fileNameWithPath = $fileHandler->uploadFile($file, $this->getParameter('uploads_dir'));
          
          $user->setPhotoUrl($fileNameWithPath);
          
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
    /******************************
     *  SUBSCRIPTION PAGE ROUTE 
     ******************************/
    #[Route('/subscription', name: 'subscription')]
    public function subscription()
    {
        return $this->render('/front/subscription.html.twig');
    }
     /******************************
     *  CONTACT PAGE ROUTE 
     ******************************/
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, EMailer $emailer)
    {
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData();
            $response = $emailer->sendEmail($contact->getEmail(), $contact->getName(), $contact->getMessage());
            echo $response;
        }
        return $this->render('/front/contact.html.twig', [
            'contactForm' => $contactForm->createView()
        ]);
    }
    
     /** ****************************
     *  FOOTER TAG LINKS 
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
