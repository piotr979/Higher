<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    private $paginator;
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Article::class);
        $this->paginator = $paginator;
    }

 /**
     * Get two the most popular authors
     */
    public function getAuthorsByNumberOfArticles(): array
    {
        $qb = $this->createQueryBuilder('a')
        ->select('max(a.id), max(u.first_name), max(u.last_name), max(u.bio),
                 max(u.photo_url), count(a.user)')
            ->innerJoin('a.user','u')
            ->groupBy('a.user')
            ->orderBy('count(a.user)','DESC');

        $query = $qb->getQuery();
        return ($query->execute());
        
    }
    public function getMostPopularTags()
    {
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
       $stmt = $connection->query('SELECT 
       article.id, 
       color,title,
       content, 
       image_url, 
       time_to_read, 
       created_at, 
       first_name, 
       last_name, 
       ARRAY_AGG(tag_title, '.') AS tags, 
       subtitle FROM article 
       INNER JOIN "user" AS u ON article.user_id = u.id
       INNER JOIN article_tag ON article.id = article_tag.article_id 
       INNER JOIN tag ON article_tag.tag_id = tag.id 
       GROUP BY article.id 
       ORDER BY created_at DESC; ');
       
       $data = $stmt->fetchAllAssociative();
       return $data;
    }

    public function findAllPaginated($page, $sorting, $tag,$authorId, $searchString)
    {
        $conn = $this->getEntityManager()->getConnection();
     
        $sqlTags = "SELECT article.id, color,title, content, image_url, 
        time_to_read, created_at, first_name, last_name, tag_title AS tags, subtitle FROM article
        INNER JOIN user ON article.user_id = user.id
        INNER JOIN article_tag ON article.id = article_tag.article_id 
        INNER JOIN tag ON article_tag.tag_id = tag.id
        WHERE tag.tag_title = :tagTitle
        ";

    $sqlFiltering = "SELECT article.id, color,title, content, image_url, 
    time_to_read, created_at, first_name, last_name, GROUP_CONCAT(tag_title) AS tags, subtitle FROM article
    INNER JOIN user ON article.user_id = user.id
    INNER JOIN article_tag ON article.id = article_tag.article_id 
    INNER JOIN tag ON article_tag.tag_id = tag.id
    WHERE title LIKE ('%' || :searchString || '%') 
                OR content LIKE ('%' || :searchString || '%')
                GROUP BY article.id ORDER BY 
     	    (CASE WHEN :sorting = 'newest' THEN created_at END) DESC,
            (CASE WHEN :sorting = 'oldest' THEN created_at END) ASC";
        
    $sqlByAuthor = "SELECT article.id, color,title, content, image_url, 
        time_to_read, created_at, first_name, last_name, GROUP_CONCAT(tag_title) AS tags, subtitle FROM article
        INNER JOIN user ON article.user_id = user.id
        INNER JOIN article_tag ON article.id = article_tag.article_id 
        INNER JOIN tag ON article_tag.tag_id = tag.id
        WHERE user.id = :authorId
        GROUP BY article.id ORDER BY created_at DESC
        ";
        if  ($authorId !='0') {
            $queryParams = ['authorId' => $authorId ];
            $stmt = $conn->prepare($sqlByAuthor);
        }
        else if ($tag =='notag' || $tag == '') {
            $queryParams = ['sorting' => $sorting,
            'searchString' => $searchString];
            $stmt = $conn->prepare($sqlFiltering);
        } else {
            $queryParams = [ 'tagTitle' => $tag ];
            $stmt = $conn->prepare($sqlTags);
        }
        $result = $stmt->executeQuery($queryParams);
      
        $data = $result->fetchAllAssociative();
        if ( isset($data)) {
        $pagination = $this->paginator->paginate($data, $page, 5);
        } else {
           return null;
        }
        return $pagination;
        
    }
    public function getAllArticleData($id)
    {
        // JOINS:
        // 1.FIRST IS ARTICLE
        // 2.THEN ARTICLE AUTHOR (USER)
        // 3.NEXT ARE ARTICLE'S COMMENTS
        // 4.AND COMMENTS AUTHORS 
        // aA prefix stands for article Author
        // cA stands for comment Author

        $conn = $this->getEntityManager()->getConnection();
        $query = ('
            SELECT  a.content AS articleContent, a.image_url AS articleCover, a.title, a.color, a.created_at, a.subtitle,
            articleAuthor.first_name AS aAFirstName, articleAuthor.last_name AS aALastName,
            articleAuthor.photo_url AS authorPhoto,
            GROUP_CONCAT(commentAuthor.first_name SEPARATOR 0x1E ) AS caFirstName, 
            GROUP_CONCAT(commentAuthor.last_name SEPARATOR 0x1E) AS caLastName,
            GROUP_CONCAT(commentAuthor.photo_url SEPARATOR 0x1E) AS caAuthorPhoto,
            GROUP_CONCAT(comment.content SEPARATOR 0x1E) AS comments,
            GROUP_CONCAT(comment.created_at SEPARATOR 0x1E) AS commentCreatedAt
            FROM article AS a 
            INNER JOIN user AS articleAuthor ON a.user_id = articleAuthor.id
            INNER JOIN comment ON comment.article_id = a.id
            INNER JOIN user AS commentAuthor ON comment.user_id = commentAuthor.id
            WHERE a.id = :id
            ');
    
          $stmt = $conn->prepare($query);
          $result = $stmt->executeQuery(['id' => $id]);
            $allData = [];

            // TODO: Improve code quality (spread operator?)

            while (($row = $result->fetchAssociative()) != false ) {
                $allData[] = [
                'articleContent' => $row['articleContent'],
                'articleCover' => $row['articleCover'],
                'articleTitle' => $row['title'],
                'articleColor' => $row['color'],
                'articleCreatedAt' => $row['created_at'],
                'articleAuthorFirstName' => $row['aAFirstName'],
                'articleAuthorLastName' => $row['aALastName'],
                'articleAuthorPhoto' => $row['authorPhoto'],
                'commentsArray' => [$this->explodeToArray("\x1E", $row['comments'])],
                'commentsAuthorFirstNames' => [$this->explodeToArray("\x1E", $row['caFirstName'])],
                'commentsAuthorLastNames' => [$this->explodeToArray("\x1E", $row['caLastName'])],
                'commentsAuthorPhotos' => [$this->explodeToArray("\x1E", $row['caAuthorPhoto'])]
                ]; 
            }
        return $allData;
       
    }
    /**
     * Explodes text to array
     * 
     * @param $separator string  ASCII code (or anything else) to separate
     * @param $text string text to explode
     * 
     * @return array 
     */
    private function explodeToArray(string $separator, string $text): array
    {
        return explode($separator, $text);
    }
   
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

