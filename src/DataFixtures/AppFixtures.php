<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tag;
use App\Entity\User;

class AppFixtures extends Fixture
{
   
    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->tagFactory("electronics"));
        $manager->persist($this->tagFactory("cooking"));
        $manager->persist($this->tagFactory("DIY"));

    
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
    public function articleFactory(int $user_id, string $content, string $image_url = '', string $title): Article
    {
        $user = new User();
        $article = new Article;
        $article->setContent($content);
        $article->setImageUrl($image_url);
        $article->setTitle($title);
        return $article;
    }
    public function tagFactory(string $tagName): Tag
    {
        $tag = new Tag;
        $tag->setTagTitle($tagName);
        return $tag;
    }

    
}
