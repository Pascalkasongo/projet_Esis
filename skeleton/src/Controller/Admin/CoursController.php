<?php
namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Form\CoursType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CoursController extends AbstractController {

    public function index(Request $request,EntityManagerInterface $em):Response{
        $cours = new Cours();
        $form= $this->createForm(CoursType::class,$cours);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($cours);
            $em->flush();
        }
        return $this->render('admin/cours.html.twig',['form'=>$form->createView()]);
    }

}