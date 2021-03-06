<?php

namespace Eduweb\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller {
    
    /**
     * @Route(
     *      "/about",
     *      name="eduweb_training_aboutPage"
     * )
     * 
     * @Template
     */
    public function aboutAction() {
        //return new Response('about');
//        $json = array(
//            'name' => 'Buty',
//            'size' => '42',
//            'price' => '123,23'
//        );   
//        
//        return new Response(json_encode($json), Response::HTTP_OK, array('Content-type' => 'application/json'));
        
//        $content = $this->renderView('EduwebTrainingBundle:Pages:about.html.twig');
//        return new Response($content);
        
//        return $this->render('EduwebTrainingBundle:Pages:about.html.twig');
        
        return array('name' => 'Michał');
    }
    
    /**
     * @Route("go-to-page")
     */
    public function goToPageAction() {
        //return $this->redirect('http://www.eduweb.pl');
        $redirectUrl = $this->generateUrl('eduweb_trainig_registerTester', array('name'=>'Marek', 'age'=>32));
        return $this->redirect($redirectUrl);
    }
    
    /**
     * 
     * @Route("print-header/{title}/{color}")
     * 
     * @param type $title
     * @param type $color
     * 
     * @Template
     */
    public function printHeaderAction($title, $color) {
        return array(
            'title' => $title,
            'color' => $color
        );
    }
    
    /**
     * @Route("/contact")
     */
    public function contactPageAction() {
        return $this->forward('EduwebTrainingBundle:Pages:printHeader', array(
            'title'=>'Kontakt',
            'color'=>'blue'
        ));
    }
    
    /**
     * @Route("/generate-error")
     */
    public function generateErrorAction() {
        //throw $this->createNotFoundException("Ta strona nie została znaleziona");
        throw new \Exception('Ups. Wystąpił błąd aplikacji');
    }
    
    /**
     * @Route(
     *      "/mastering-request/{name}",
     *      name="eduweb_training_masteringRequest"
     * )
     */
    public function masteringRequestAction(Request $Request, $name) {
        //$Request = $this->get('request');
        //return new Response($Request->get('name'));
//        return new Response($Request->query->get('color', 'red'));
        return new Response($Request->request->get('size', '123'));
    }
    
    /**
     * @Route("/read-params")
     */
    public function readParamsAction(){
        $param = $this->container->getParameter('appApiKey');
        return new Response($param);
    }
}
