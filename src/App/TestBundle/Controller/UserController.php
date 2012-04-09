<?php

namespace App\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController  extends Controller
{

    public function listAction()
    {
        $users = $this->getDoctrine()->getRepository('AppTestBundle:AuthUser')->findAll();
        return $this->render('AppTestBundle:User:list.html.twig', array('users' => $users));
    }
    
}

?>
