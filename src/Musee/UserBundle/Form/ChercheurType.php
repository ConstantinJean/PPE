<?php

namespace Musee\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChercheurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email')
            ->add('password', 'repeated', array(
           'first_name' => 'password',
           'second_name' => 'confirm',
           'type' => 'password',))
            ->add('NomThese', 'text')
            ->add('DomaineRecherche', 'text')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Musee\UserBundle\Entity\Chercheur'
        ));
    }

    public function getName()
    {
        return 'musee_userbundle_chercheurtype';
    }
}
