<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Menu;
use AppBundle\Form\MenuType;

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
        // $menus = $this
        //     ->getDoctrine()
        //     ->getRepository('AppBundle:Menu')
        //     ->findAll()
        // ;

        $menus = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Menu')
            ->findBy([])
        ;

        return $this->render('menus/menu_list.html.twig', [
            'menus' => $menus
        ]);
    }

    /**
     * @Route("/menus/{id}", name="menu_name")
     */
    public function menuDetailsAction(Request $request, $id)
    {
        $menu = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Menu')
            // ->findOneByName($name)
            // ->findOneBy(array('name' => $name))
            ->getById($id)
            // ->findOneById($id)
            // ->findOneBy(['id' => $id])
        ;

        if (is_null($menu)) {
            throw $this->createNotFoundException('Pas trouvé !');
        }

        return $this->render('menus/menu_details.html.twig', [
          'menu' => $menu
        ]);
    }

    /**
     * @Route("/newmenu", name="newmenu")
     */
    public function newMenuAction(Request $request)
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);

        return $this->render('menus/new.html.twig', [
            'form' => $form->createView()
        ]);
    }





}
