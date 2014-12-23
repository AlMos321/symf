<?php
namespace FormBundle\Controller;



use FormBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{

    /**
     * @Route("/test/")
     * @Template()
     */


    public function testAction(Request $request)
    {

        echo 'Go Go Go!!';
        return $this->render('FormBundle:Default:test.html.twig', array());

    }
}