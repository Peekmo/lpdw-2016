<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Menu;
use AppBundle\Entity\MenuLike;
use AppBundle\Form\MenuType;
use AppBundle\Form\MenuLikeType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $this->get('app.print_counter')->increase();
        $this->get('app.print_counter')->increase();
        $this->get('app.print_counter')->increase();

        die(var_dump($this->get('app.print_counter')->getNumber()));

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

        $menuLike = new MenuLike();
        $form = $this->createForm(MenuLikeType::class, $menuLike, [
          'id' => $id
        ]);

        if (is_null($menu)) {
            throw $this->createNotFoundException('Pas trouvé !');
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $menuLike = $form->getData();
            $menuLike->setMenu($menu);

            $em = $this->getDoctrine()->getManager();
            $em->persist($menuLike);
            $em->flush($menuLike);

            return $this->redirectToRoute('menu_name', [
                'id' => $menu->getId()
            ]);
        }

        return $this->render('menus/menu_details.html.twig', [
          'menu' => $menu,
          'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/newmenu", name="newmenu")
     */
    public function newMenuAction(Request $request)
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $menu = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush($menu);

            return $this->redirectToRoute('menu_name', [
                'id' => $menu->getId()
            ]);
        }

        return $this->render('menus/new.html.twig', [
            'form' => $form->createView()
        ]);
    }





}
