<?php
// src/board/boardBundle/Form/BoardForm.php

namespace Board\BoardBundle\Form;

use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class BoardForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('title');
        $builder->add('message','textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}
