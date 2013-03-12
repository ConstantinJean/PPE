<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator; //pour la pagination

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
	public function getArticle($nombreParPage, $page)
	{
		$query = $this -> createQueryBuilder('a')
					   -> leftJoin('a.image', 'i')
							->addSelect('i')
						-> leftJoin('a.typeArticle', 't')
							->addSelect('t')
						-> orderBy('a.dateEdition', 'DESC')
						-> getQuery();
						
		$query -> setFirstResult(($page-1) * $nombreParPage)
				-> setMaxResults($nombreParPage);
		
		return new Paginator($query);
	}					
}
