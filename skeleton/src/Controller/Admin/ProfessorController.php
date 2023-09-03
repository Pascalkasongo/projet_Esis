<?php

namespace App\Controller\Admin;

use App\Entity\Professeur;
use App\Form\ProfesseurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfessorController extends AbstractController{

    public function index(Request $request, EntityManagerInterface $em):Response{
        $prof = new Professeur();
        $form =$this->createForm(ProfesseurType::class,$prof);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($prof);
            $em->flush();
        }

        return $this->render('Admin/professeur.html.twig',['form'=>$form->createView()]);
    }
}