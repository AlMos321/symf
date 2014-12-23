<?php


// src/AppBundle/Form/Type/TaskType.php
namespace FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('task','text')
            ->add('dueDate', 'date', array('widget' => 'single_text'))
            ->add('save', 'submit')
            ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'));

    }



    public function getName()
    {
        return 'task';
    }
}