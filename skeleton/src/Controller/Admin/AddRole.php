<?php

namespace App\Controller\Admin;

use App\Entity\Role;
use App\Form\RoleType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddRole extends AbstractController{

    public function index(Request $request, EntityManagerInterface $em):Response{
        $role = new Role();
        $form =$this->createForm(RoleType::class,$role);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($role);
            $em->flush($role);
        }
        return $this->render('admin/nav/role.html.twig',['form'=>$form->createView()]);
    }
}