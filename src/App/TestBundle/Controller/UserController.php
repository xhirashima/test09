<?php
namespace App\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\TestBundle\Entity\AuthUser;

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
        
        //
        $form = $this->createFormBuilder($authuser)
                ->add('username', 'text')
                ->getForm();
        
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
