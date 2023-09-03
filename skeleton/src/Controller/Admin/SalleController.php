<?php

namespace App\Controller\Admin;

use App\Entity\Salle;
use App\Form\SalleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SalleController extends AbstractController{


    public function index(Request $request,EntityManagerInterface $em):Response{

        $salle = new Salle();
        $form = $this->createForm(SalleType::class,$salle);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($salle);
            $em->flush();
        } return $this->render('admin/salle.html.twig',['form'=>$form->createView()]);
    }
}