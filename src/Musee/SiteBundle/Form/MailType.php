<?php
// src/Musee/SiteBundle/Form/MailType.php

namespace Musee\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('required' => true));
        $builder->add('email', 'email', array('required' => true));
        $builder->add('subject', 'text', array('required' => true));
        $builder->add('body', 'textarea', array('required' => true));
    }

    public function getName()
    {
        return 'contact';
    }
}