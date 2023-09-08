<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessorController extends AbstractController{

    #[Route('/admin/professeur_lists',name: 'professor.show')]

    public function show(Request $request):Response{

        // $professeur = new Professor;
        return $this->render('admin/page/add_enseignant.html.twig');
    }
}