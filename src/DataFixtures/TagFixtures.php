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
            $manager->persist($this->tagGenerator($tag));
        }
        $manager->flush();
    }

    public function tagGenerator(string $tag): Tag
    {
        return new Tag($tag);
    }
}
