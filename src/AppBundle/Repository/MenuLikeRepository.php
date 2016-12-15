<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MenuLikeRepository extends EntityRepository
{
  /**
   * Retourne le total de notes d'un menu
   *
   * @param  int $menuId Identifiant du menu
   *
   * @return int
   */
    public function getCountMenuLike($menuId)
    {
        return $this
            ->createQueryBuilder('ml')
            ->select('count(ml)')
            ->where('ml.menu = :menu')
            ->setParameter('menu', $menuId)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * Retourne la moyenne des notes d'un menu
     *
     * @param  int $menuId Identifiant du menu
     *
     * @return int
     */
    public function getAvgMenuLike($menuId)
    {
        return $this
            ->createQueryBuilder('ml')
            ->select('avg(ml.rating)')
            ->where('ml.menu = :menu')
            ->setParameter('menu', $menuId)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
}
