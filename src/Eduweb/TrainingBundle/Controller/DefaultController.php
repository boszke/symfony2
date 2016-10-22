<?php

namespace Eduweb\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EduwebTrainingBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function registerUserAction()
    {
        $responseMsg = "Rejestracja użytkownika";
        return new Response($responseMsg);
    }
}
