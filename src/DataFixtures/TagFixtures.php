<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tag;
class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tags = ["Relationships",
                "Science",
                "Programming",
                "Productivity",
                "Machine Learning",
                "Politics",
                "DIY",
                "Cooking",
                "Electronics",
                "Hobby",
                "Gardening",
                "Parenting",
                "History",
                "Biology",
                "Music",
                "Travelling",
                "Health"];
        forEach($tags as $tag) {
            $tagObject = $this->tagGenerator($tag);
            $manager->persist($tagObject);
            $this->addReference($tag, $tagObject);
        }
        $manager->flush();
    }

    public function tagGenerator(string $tagTitle): Tag
    {
        $tag = new Tag();
        $tag->setTagTitle($tagTitle);
        return $tag;
    }
}
