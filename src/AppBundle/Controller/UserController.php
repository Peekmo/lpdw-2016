<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/login", name="menu_login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('user/login.html.twig');
    }

    /**
     * @Route("/login_check", name="menu_check")
     */
    public function loginCheckAction(Request $request)
    {

    }
}
