<?php
namespace App\Controller\Admin;

use App\Entity\Compte;
use App\Form\CompteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CompteController extends AbstractController{


    public function index(Request $request, EntityManagerInterface $em):Response{
        
        $compte = new Compte();

        $form = $this->createForm(CompteType::class,$compte);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($compte);
            $em->flush($compte);

            echo("u'd new role");
        }
        return $this->render('admin/role.html.twig',['form'=>$form->createView()]);

    }
}