<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       
        $user = $this->userFactory(
            'adh@gmail.com',
            '123456',
            'John',
            'Murphy',
            ''
            );

            // $product = new Product();
        // $manager->persist($product);

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
        $passwordHasher = new UserPasswordHasherInterface;
        $user = new User();
        $user->setEmail($email);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setPhotoUrl($imageUrl);

    
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plainPassword
        );
        $user->setPassword($hashedPassword);
        return $user;
    }
}
