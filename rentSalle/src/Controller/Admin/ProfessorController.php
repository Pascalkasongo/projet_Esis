<?php

namespace App\Controller\Admin;

use App\Entity\Professor;
use App\Form\ProfessorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessorController extends AbstractController{

    #[Route('/admin/create_professor', name: 'professor.create')]

    public function create(Request $request,EntityManagerInterface $em):Response{

        $professeur = new Professor();
        $form = $this->createForm(ProfessorType::class,$professeur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($professeur);
            $em->flush();
            return $this->redirectToRoute('role.show');
        }

        return $this->render('admin/nav/add_enseignant.html.twig',['form'=>$form]);
    }

    #[Route('/admin/professor_list', name: 'professor.show')]

    public function show(EntityManagerInterface $em):Response{
        $professors = $em->getRepository(Professor::class)->findAll();
        return $this->render('admin/nav/table_enseignant.html.twig',['professors'=>$professors]);
    }

    #[Route('/admin/professor_delete/{id}', name: 'professor.delete')]
    public function delete(EntityManagerInterface $em,$id):Response{
        $professor = $em->getRepository(Professor::class)->find($id);
    
        $em->remove($professor);
        $em->flush();

        return $this->redirectToRoute('professor.show');
    }


    #[Route('/admin/role_edite/{id}',name:'role.edite')]

    public function edite(Request $request,EntityManagerInterface $em,$id):Response{
       
        $professor = $em->getRepository(Professor::class)->find($id);

        $form = $this->createForm(ProfessorType::class, $professor);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $em->flush();
           return  $this->redirectToRoute('professor.show');
        }
        
        return $this->render('admin/nav/professor.edite.html.twig',[
            'form'=>$form->createView(),
            'role'=>$professor
            ]);
    }
}