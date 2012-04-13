<?php
namespace App\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\TestBundle\Entity\AuthUser;
use App\TestBundle\Form\Type\AuthUserType;
use App\TestBundle\Form\Data\AuthUserFormData;

class UserController  extends Controller
{

    public function listAction()
    {
//        $users = $this->getDoctrine()->getRepository('AppTestBundle:AuthUser')->findAll();
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM AppTestBundle:AuthUser a";
        $query = $em->createQuery($dql);

        //pagerオブジェクト取得
        $paginator = $this->get('knp_paginator');
        $users = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            3/*limit per page*/
        );
        
        return $this->render('AppTestBundle:User:list.html.twig', array('users' => $users));
    }
    
    public function createAction(Request $request)
    {
        //
        $authuser = new AuthUser();

        //formクラスとformdataクラスを使用するパターン
        $authuser_form = new AuthUserFormData();
        $form = $this->createForm(new AuthUserType(), $authuser_form);
        
/*        
        //formクラスを使用するパターン
        $form = $this->createForm(new AuthUserType(), $authuser);
*/
/*
        //createFormBuilderを使用するパターン
        $form = $this->createFormBuilder($authuser)
                ->add('username', 'text')
                ->getForm();
*/
        
        //
        if ($request->getMethod() === 'POST')
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                
            }
        }
        
        return $this->render('AppTestBundle:User:create.html.twig', array('form' => $form->createView()));
    }
        
}

?>
