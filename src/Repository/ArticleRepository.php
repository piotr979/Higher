<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }
 /**
     * Get two the most popular authors
     */
    public function getAuthorsByNumberOfArticles(): array
    {
    /*
     SELECT first_name, last_name, COUNT(article.user_id) AS total FROM a
     INNER JOIN user ON article.user_id = user.id GROUP BY 
     article.user_id ORDER BY total DESC;
    */
        $qb = $this->createQueryBuilder('a')
        ->select('u.first_name, u.last_name, u.bio, u.photo_url, count(a.user)')
            ->innerJoin('a.user','u')
            ->groupBy('a.user')
            ->orderBy('count(a.user)','DESC');

        $query = $qb->getQuery();
        return ($query->execute());
        
    }
    public function getMostPopularTags()
    {
    // SELECT tag_id, COUNT(*) as c FROM article_tag GROUP BY tag_id ORDER BY c DESC;

        $qb = $this->createQueryBuilder('a')
       ->innerJoin('a.tagsId', 't')
       ->select('t.id, t.tagTitle, count(t.id) AS amount')
       ->groupBy('t.id')
       ->orderBy('count(t.id)','DESC');

        $query = $qb->getQuery();
        return $query->execute();
    }
    
    public function getLatestArticles()
    {
        /* USE higher;
           SELECT color,title, GROUP_CONCAT(tag_title) FROM article 
           INNER JOIN article_tag ON article.id = article_tag.article_id 
           INNER JOIN tag ON article_tag.tag_id = tag.id GROUP BY article.id; 
        */

       $connection = $this->getEntityManager()->getConnection();
       $stmt = $connection->query('SELECT color,title, content, image_url, 
       time_to_read, created_at, first_name, last_name, GROUP_CONCAT(tag_title) AS tags FROM article 
       INNER JOIN user ON article.user_id = user.id
       INNER JOIN article_tag ON article.id = article_tag.article_id 
       INNER JOIN tag ON article_tag.tag_id = tag.id GROUP BY article.id ORDER BY created_at DESC; ');
       
       $dataArray = array();
       $i = 0;
       while (($row = $stmt->fetchAssociative()) !== false) {
        $dataArray[] = array(
            array('title' => $row['title'],
                  'content' => $row['content'],
                  'image' => $row['image_url'],
                  'color' => $row['color'],
                  'time' => $row['time_to_read'],
                  'date' => $row['created_at'],
                  'tags' => $row['tags'],
                  'aFirstName' => $row['first_name'],
                  'aLastName' => $row['last_name'])
        );

    };
    return $dataArray;
    }
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        ->groupBy('article.user_id')
            ->orderBy('total', 'DESC');

        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
