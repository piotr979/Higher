<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method Comment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comment[]    findAll()
 * @method Comment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentRepository extends ServiceEntityRepository
{
    private $paginator;

    public function __construct(PaginatorInterface $paginator, ManagerRegistry $registry)
    {
        $this->paginator = $paginator;
        parent::__construct($registry, Comment::class);
    }
    public function findAllPaginated($page) {
        $conn = $this->getEntityManager()->getConnection();

        $dql   = "SELECT c.id, c.content, user.first_name, user.last_name FROM comment AS c
        LEFT JOIN user ON c.user_id = user.id";
      $stmt = $conn->prepare($dql);
        $result = $stmt->executeQuery();
        $data = $result->fetchAllAssociative();

        if ( isset($data)) {
            $pagination = $this->paginator->paginate($data, $page, 5);
            } else {
               return null;
            }
            return $pagination;
        }

    public function getCommentWithUsersData($comments)
    {
        $qb = $this->createQueryBuilder('c')
        ->select('c.user_id, u.first_name, content')
        ->innerJoin('c.user_id','u');
        $query = $qb->getQuery();
        dump($query);exit;
    } 

    // /**
    //  * @return Comment[] Returns an array of Comment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Comment
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
