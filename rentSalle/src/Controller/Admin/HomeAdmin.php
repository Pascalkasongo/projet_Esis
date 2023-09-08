<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeAdmin extends AbstractController{

    #[Route('/admin/login',name: 'home_login')]

    public function adminLogin():Response{

        return $this->render('admin/nav/login.html.twig');
    }

    #[Route('/admin',name: 'home_admin')]

    public function home():Response{
        return $this->render('admin/nav/index.html.twig');
    }

}