<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Menu;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/menus", name="menu_list")
     */
    public function menuListAction(Request $request)
    {
        $menus = [
            new Menu('pizza', 'c\'est bon', 'de la pâte'),
            new Menu('quiche', 'c\'est moins bons', 'de la pâte')
        ];

        return $this->render('menus/menu_list.html.twig', [
            'menus' => $menus
        ]);
    }

    /**
     * @Route("/menus/{name}", name="menu_name")
     */
    public function menuDetailsAction(Request $request, $name)
    {
        $menu = new Menu($name, 'cool', 'champignons');

        return $this->render('menus/menu_details.html.twig', [
          'menu' => $menu
        ]);
    }






}
