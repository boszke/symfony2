<?php

namespace Eduweb\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/eduweb")
 */
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EduwebTrainingBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function registerUserAction($name, $age, $role)
    {
        $responseMsg = sprintf("Rejestracja użytkownika o nazwie %s (wiek: %d), rola w systemie %s", $name, $age, $role);
        return new Response($responseMsg);
    }
    
    public function simple1Action() {
        return new Response("Simple1");
    }
    
    public function simple2Action() {
        return new Response("Simple2");
    }
    /**
     * 
     * @Route(
     *      "/register-tester/{name}-{age}-{role}",
     *      name="eduweb_trainig_registerTester",
     *      defaults={"role"="units"},
     *      requirements={"age"="\d+", "role"="units|functional"}
     * )
     * 
     * @Method({"GET"})
     */
    public function registerTesterAction($name, $age, $role) {
        $responseMsg = sprintf("Rejestracja testera o nazwie %s (wiek: %d), rola w systemie %s", $name, $age, $role);
        return new Response($responseMsg);
    }
    /**
     * @Route("/anno")
     */
    public function anno2Action() {
        return new Response("anno2");
    }
    /**
     * 
     * @Route("/anno")
     */
    public function anno1Action() {
        return new Response("anno1");
    }
    
    /**
     * 
     * @Route("/generate-url")
     */
    public function generateUrlAction() {
        $response = $this->generateUrl('eduweb_training_registerUser', array(
            'name'=> 'Marcin',
            'age'=> 52,
            'country' => 'Poland'
        ), TRUE );
        return new Response($response);
    }
    
    /**
     * @Route(
     *      "/debugging",
     *      name="eduweb_training_debugging"
     * )
     */
    public function debuggingAction() {
        return new Response('<html><head><title>Debugging</title></head><body>debugging</body></html>');
    }
    
}
