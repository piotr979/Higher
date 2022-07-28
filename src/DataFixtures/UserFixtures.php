<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) 
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
       $emails = [
        'user@user.com','user2@user2.com', 'user3@user3.com', 'admin@admin.com'
       ];
       $firstName = [
        'John','Andrea', 'Robert', 'Admin'
       ];
       $lastName = [
        'Murphy', 'Jackson','Edwin', ''
       ];
       $bio = [
        'John Murphy is a developer based in India. He enjoys solving complex
        technical problems and loves working with JavaScript.',
        'Andrea has been an editor at Higher since 2013.
         Whenever she’s not writing articles for the weekly Higher Newsletter,
          she’s probably working on a new Life eBook.',
          'Robert Edwin has been writing for over 30 years,
          and is currently a web developer in New Zealand. 
          His special interests include Gardening, parenting,
           and role-playing games.',
           'Admin'
       ];
       $images = [
        'uploads/users/christian-buehner-DItYlc26zVI-unsplash.jpg',
        'uploads/users/jessica-felicio-_cvwXhGqG-o-unsplash49d1c036298d561f17ce8b1391db1d77.jpg',
        'uploads/users/ben-parker-OhKElOkQ3RE-unsplash.jpg',
        ''
       ];
       $users = [];
       for($i=0; $i<=(count($emails)-1); $i++) 
       {
           
          $users[] = $this->userFactory(
            $emails[$i],
            '123456',
            $firstName[$i],
            $lastName[$i],
            $bio[$i],
            $images[$i]
          );
          $this->addReference("user$i", $users[$i]);
           $manager->persist($users[$i]);
       }

        $manager->flush();
    }
    public function userFactory(
            string $email, 
            string $plainPassword, 
            string $firstName, 
            string $lastName = '', 
            string $bio = '',
            string $imageUrl = ''
            ): User
    {
       
        $user = new User();
        $user->setEmail($email);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setPhotoUrl($imageUrl);
        if ($email === "admin@admin.com") {
            $user->setRoles(["ROLE_ADMIN"]);
        }
    
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plainPassword
        );
        $user->setPassword($hashedPassword);
        return $user;
    }
}
