<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15.12.14
 * Time: 23:17
 */

namespace FormBundle\Controller;


//use Symfony\Component\BrowserKit\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FormBundle\Mailer;


class ServController extends Controller{

    /**
     * @Route("/service/")
     * @Template()
     */

    public function firstAction(Request $request)
    {

        $mailer = $this->get('my_mailer');
        $mailer->SendMail();

        return $this->render('FormBundle:Default:firs.html.twig', array());

    }

} 