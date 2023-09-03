<?php
namespace App\Controller\Admin;

use App\Entity\Promotion;
use App\Form\PromotionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController{


    public function index(Request $request,EntityManagerInterface $em):Response{

        $promotion = new Promotion();
        $form=$this->createForm(PromotionType::class,$promotion);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($promotion);
            $em->flush();
        }

        return $this->render('admin/promotion.html.twig',['form'=>$form->createView()]);
    }

}
 