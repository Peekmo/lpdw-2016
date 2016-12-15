<?php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;

class MenuLikeService
{
    /**
     * @var EntityManager
     */
    private $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Retourne le nombre total de notes sur un menu
     * @param  int $menuId Identifiant du menu
     * @return int
     */
    public function getTotalMenuLike($menuId)
    {
        return $this
            ->doctrine
            ->getRepository('AppBundle:MenuLike')
            ->getCountMenuLike($menuId)
        ;
    }

    /**
     * Retourne la miyenne des notes sur un menu
     * @param  int $menuId Identifiant du menu
     * @return int
     */
    public function getAvgMenuLike($menuId)
    {
        return $this
            ->doctrine
            ->getRepository('AppBundle:MenuLike')
            ->getAvgMenuLike($menuId)
        ;
    }
}
