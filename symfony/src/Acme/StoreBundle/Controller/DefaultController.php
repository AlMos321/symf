<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    /**
     * @Route("/store/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id '.$product->getId());
    }

    /**
     * @Route("/prod/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response($product->getName());

        // ... do something, like pass the $product object into a template
    }

    /**
     * @Route("/update/{id}/{name}")
     * @Template()
     */

    public function updateAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName($name);
        $em->flush();

        return new Response($product->getName());
        //return $this->redirect($this->generateUrl('http://simf.com/symfony/web/app_dev.php/prod/{id}'));
    }

    /**
     * @Route("/del/{id}")
     * @Template()
     */

    public function delAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($product);
        $em->flush();

        return new Response('del');
       // return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/act/{name}")
     * @Template()
     */

    public function createAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AcmeStoreBundle:Product')
            ->findAllOrderedByName($name);
       // return new Response($products);
    }

}





