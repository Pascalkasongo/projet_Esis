<?php

namespace App\Controller\Admin;

use App\Entity\Professeur;
use App\Form\ProfessorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessorController extends AbstractController{

    #[Route('/admin/create_professor',name:'professor.create')]
    public function create(Request $request, EntityManagerInterface $em):Response{

        $professor = new Professeur();
        $form = $this->createForm(ProfessorType::class,$professor);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($professor);
            $em->flush();
            return $this->redirectToRoute('professor.show');
        }

        return $this->render('admin/nav/professeur.html.twig',['form'=>$form->createView()]);

    }

    #[Route('/admin/professor_list',name: 'professor.show')]

    public function show(EntityManagerInterface $em ){
        $professors = $em->getRepository(Professeur::class)->findAll();
        return $this->render('admin/nav/table_enseignant.html.twig',['professors'=>$professors]);
    }

    #[Route('/admin/edite_professor/{id}',name:'edite.professor')]

   
    public function edite(Request $request,EntityManagerInterface $em,$id):Response{
       
        $professor = $em->getRepository(Professeur::class)->find($id);

        $form = $this->createForm(ProfessorType::class, $professor);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $em->flush();
           return  $this->redirectToRoute('professor.show');
        }
        
        return $this->render('admin/nav/professor.edite.html.twig',[
            'form'=>$form->createView(),
            'professors'=>$professor
            ]);
    }

    #[Route('/admin/professor_delete/{id}', name: 'professor.delete')]

    public function delete(EntityManagerInterface $em,$id):Response{
        $professor = $em->getRepository(Professeur::class)->find($id);
    
        $em->remove($professor);
        $em->flush();

        return $this->redirectToRoute('professor.show');
    }
    
}
