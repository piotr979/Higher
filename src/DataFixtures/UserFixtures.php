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
       
        $user = $this->userFactory(
            'adh@gmail.com',
            '123456',
            'John',
            'Murphy',
            'public/assets/images/christian-buehner-DItYlc26zVI-unsplash.jpg'
            );
        $user2 = $this->userFactory(
            'user@user.com',
            '123456',
            'Andrea',
            'Jackson',
            'public/assets/jessica-felicio-_cvwXhGqG-o-unsplash.jpg'
            );

            // $product = new Product();
         $manager->persist($user);
         $manager->persist($user2);

        $manager->flush();
    }
    public function userFactory(
            string $email, 
            string $plainPassword, 
            string $firstName, 
            string $lastName = '', 
            string $imageUrl = '',
            ): User
    {
       
        $user = new User();
        $user->setEmail($email);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setPhotoUrl($imageUrl);

    
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plainPassword
        );
        $user->setPassword($hashedPassword);
        return $user;
    }
}
