<?php

namespace Musee\CollectionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StatutObjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etat', 'textarea')
            ->add('dateAquisition', 'date')
            ->add('dateRetour', 'date')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Musee\CollectionBundle\Entity\StatutObjet'
        ));
    }

    public function getName()
    {
        return 'musee_collectionbundle_statutobjettype';
    }
}
