<?php

namespace App\Controller\Admin;

use App\Entity\Role;
use App\Form\RoleType;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoleController extends AbstractController{
  
    #[Route('/admin/role_list',name: 'role.show')]

    public function show(EntityManagerInterface $em):Response{

        $roles = $em->getRepository(Role::class)->findAll();
        return $this->render('admin/nav/table_role.html.twig',['roles'=>$roles]);
    }

    #[Route('/admin/role_create',name: 'role.create')]

    public function create(EntityManagerInterface $em, Request $request):Response{
        $role = new Role();
        $form = $this->createForm(RoleType::class,$role);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($role);
            $em->flush();

            return $this->redirectToRoute('role.show');
        }

        return $this->render('admin/nav/role.html.twig',['form'=>$form->createView()]);
    }

    #[Route('/admin/role_edite/{id}',name:'role.edite')]

    public function edite(Request $request,EntityManagerInterface $em,$id):Response{
       
        $roles = $em->getRepository(Role::class)->find($id);

        $form = $this->createForm(RoleType::class, $roles);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $em->flush();
           return  $this->redirectToRoute('role.show');
        }
        
        return $this->render('admin/nav/role.edite.html.twig',[
            'form'=>$form->createView(),
            'role'=>$roles
            ]);
    }

    #[Route('/admin/role_delete/{id}', name: 'role.delete')]
    public function delete(EntityManagerInterface $em,$id):Response{
        $role = $em->getRepository(Role::class)->find($id);
    
        $em->remove($role);
        $em->flush();

        return $this->redirectToRoute('role.show');
    }
}