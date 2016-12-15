<?php

namespace AppBundle\Twig;
use AppBundle\Services\MenuLikeService;

class MenuLikeExtension extends \Twig_Extension
{
    /**
     * @var MenuLikeService
     */
    private $menuLikeService;

    /**
     * @param MenuLikeService $menuLikeService
     */
    public function __construct(MenuLikeService $menuLikeService)
    {
        $this->menuLikeService = $menuLikeService;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'get_total_menu_like',
                [$this, 'getTotalMenuLike']
            ),
            new \Twig_SimpleFunction(
                'get_average_menu_like',
                [$this, 'getAvgMenuLike']
            )
        ];
    }

    public function getTotalMenuLike($menuId)
    {
        return $this->menuLikeService->getTotalMenuLike($menuId);
    }

    public function getAvgMenuLike($menuId)
    {
        return $this->menuLikeService->getAvgMenuLike($menuId);
    }
}
