<?php

namespace App\Controller\Admin;

use App\Entity\Filiere;
use App\Form\FiliereType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FiliereController extends AbstractController {


    public function index(Request  $request , EntityManagerInterface $em):Response{
        
        $filiere =  new Filiere();

        $form = $this->createForm(FiliereType::class,$filiere);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($filiere);
            $em->flush();
        }
        return $this->render('admin/filiere.html.twig',['form'=>$form->createView()]);
    }


}