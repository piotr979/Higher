<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Article;
use App\Entity\Tag;
use App\Entity\User;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $articles = [
            [
                'Cooking up memories this holiday season',
                'The kitchen is considered the heart of the home and this is never so true as during 
       the holidays. For many people at this time of year, it’s important to have a place where 
       you can cook and spend time with loved ones without feeling cramped or stressed out.
       Gone are the days of the design mindset when kitchens were tucked away and used only for 
       prepping food. Today, they’re an extension of living areas. Homebuyers want beautiful 
       open spaces and expansive islands for effortless and elegant gathering. In the following 
       homes, represented by Allie Beth Allman & Associates, the kitchens will bring you joy this
        holiday season. The recently updated home at 104 Keystone Drive in Southlake’s Estes Park
         community is offered by Dona Robinson.The kitchen has a large island and new appliances 
         and connects to a double-height great room. This provides a seamless flow for large-scale 
         entertaining.Closer to Dallas’ center is the stone residence at 7130 Brookcove Lane, 
         offered by Jean Bateman. The 7,648-square-foot home includes a rustic kitchen that
          blends stone and wood and opens to a spacious living area and wet bar. The kitchen
           includes a separate baker’s cupboard.',
                'uploads/covers/12763-celeriac37c04cbbd02913c81049531cef3473b5.jpg',  // imageUrl
                [1, 2], // tags
                1, 5

            ],
            [
                'The Best Black Friday Weekend Tech and Electronics Deals',
                'All products and services featured are independently chosen by editors. 
        owever, Billboard may receive a commission on orders placed through its retail links,
         and the retailer may receive certain auditable data for accounting purposes.
        Black Friday may be over but the savings continue through Black Friday weekend and 
        into Cyber Monday.
        A number of electronics brands have discounted their top tech products this weekend,
         with savings of up to $350 on top-rated TVs, headphones, earbuds and smartwatches. 
         Many of these electronics deals feature products that are being discounted for the 
         first time this year, making this weekend a great time to snag those wireless earbus or smart home device you’ve been eyeing.
        From a new $54 Amazon fitness tracker to a $45 AirPods dupe, we’ve rounded up the best tech and electronics deals to shop
         this Black Friday weekend. Quantities are starting to run out so we recommend adding to cart now.
        $101 off Sony WH-1000XM4 Wireless Headphone Sony WH-1000XM4 Wireless
        Shop: Sony WH-1000XM4 Wireless Noise-Cancelling Headphones $248
        One of the best Black Friday weekend deals is on the Sony WH-1000XM4 Wireless Headphones — the top-rated noise-cancelling headphones on the market today. Regularly $349+, the headphones are on sale for just $248 — the lowest price we’ve seen for these cans all year. See the deal here.
        $40 off Echo Show 5 ',
                'uploads/covers/blackfriday3f40b8c4d896c9effe21debfb47d4812.png',  // imageUrl
                [1, 2], // tags
                3, 6
            ],
            [
                'Herbalife Nutrition, a premier global nutrition company, today introduces its latest science-backed product.',
                ' According to a recent U.S. study by OnePoll, the average person overindulges in 
                unhealthy food three nights per week, and when a person is working to maintain
                 a healthy lifestyle or on a weight loss journey, overindulging affects their 
                 health goals. This product helps trim the fat from food to keep consumers 
                 on track with their health goals.While this new product is not a stand-alone weight loss product,
                it can be helpful to consumers who indulge and have fatty foods as part of a meal, 
                if consumed within two hours of the meal. Fat Release is formulated with Litramine®, 
                the beneficial ingredient in the product, which is derived from prickly pear and is a patented 
                 cactus fiber ingredient that helps trim the fat from food.',
                'uploads/covers/HealthBlocks6026326d5b9ff0cb541463696786795e.png',  // imageUrl
                [1, 2], // tags
                2, 7
            ]
        ];

        foreach ($articles as $article) {
            $title = $article[0];
            $content = $article[1];
            $imageUrl = $article[2];
            $tags = $article[3];
            $color = $article[4];
            $timeToRead = $article[5];
            $article = $this->articleGenerator($title, $content, $imageUrl, $tags, $color, $timeToRead);
            $manager->persist($article);
        }
        $manager->flush();
    }
    public function articleGenerator(
        string $title,
        string $content,
        string $imageUrl,
        array $tagsId,
        int $color,
        int $timeToRead
    ): Article {
        $backendTeam = $this->getReference('user1');
        $tagRef = $this->getReference('Electronics');
        //  $tagRef->setTagTitle("electronics");

        $user1 = $this->getReference('user1');
        $article = new Article();
        $article->setContent($content);
        $article->setImageUrl($imageUrl);
        $article->setTitle($title);
        $article->setColor($color);
        $article->setUser($user1);
        $article->addTagsId($tagRef);
        $article->setTimeToRead($timeToRead);
        return $article;
    }
    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
