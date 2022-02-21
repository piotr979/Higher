<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\User;
class SecurityController extends AbstractController
{
    private UrlGeneratorInterface $urlGenerator;

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/redirectuser", name="redirectuser")
     */
    public function redirectUser() {

       if (in_array('ROLE_ADMIN', $this->getUser()->getRoles())) {

           return $this->redirect($this->generateUrl('admin'));
       } else {
        return $this->redirect($this->generateUrl('profile'));
       }
    }

    /**
     * @Route("/reset-password/{id}", name="reset-password")
     */
     public function resetPassword($id)
     {
         $user = $this->getDoctrine()->getRepository(User::class)->find($id);
         $em = $this->getDoctrine()->getManager();

         $password = "Passwordziku";
         $user->setPassword($password);
         $em->persist($user);
         $em->flush();
         $this->addFlash("notice", "New password: {$password} has been generated");
        return $this->redirect($this->generateUrl('admin-users'));
     }

     /**
      * @Route("/remove-user/{id}", name="remove-user")
      */
      function removeUser($id)
      {
          $user = $this->getDoctrine()->getRepository(User::class)->find($id);
          $em = $this->getDoctrine()->getManager();

          $em->remove($user);
          $em->flush();
          $this->addFlash("notice","User has been removed.");
          return $this->redirect($this->generateUrl('admin-users'));
      }
}
