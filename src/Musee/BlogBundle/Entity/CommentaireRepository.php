<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Musee\BlogBundle\Entity\Article;

/**
 * CommentaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentaireRepository extends EntityRepository
{
	function findCommentaireByArticle(Article $article)
	{
		$qb = $this -> createQueryBuilder('c')
			->leftJoin('c.article', 'a')
			 ->where('a.id = :id')
			->setParameter('id', $article)
			->orderBy('c.Date', 'DESC');
			
		return $qb -> getQuery() -> getResult();
	}
}
