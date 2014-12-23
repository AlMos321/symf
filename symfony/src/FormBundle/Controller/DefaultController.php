<?php

namespace FormBundle\Controller;


use FormBundle\Entity\Task;
use FormBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;






class DefaultController extends Controller
{

    /**
     * @Route("/form/{name}")
     * @Template()
     */


    public function newAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(new TaskType(), $task);

     /**   $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
            ->getForm(); **/

        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

           /** $nextAction = $form->get('saveAndAdd')->isClicked()
                ? 'task_new'
                : 'task_success';
            **/

           // return $this->redirect($this->generateUrl('task_success'));
            return new Response('Добавлено новое задание: '.$task->getTask());
        }

        return $this->render('FormBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}




