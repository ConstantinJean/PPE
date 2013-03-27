<?php

namespace Musee\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class COmmentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('auteur', 'text')
            ->add('contenu', 'textarea', array('required' => true))
            
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Musee\BlogBundle\Entity\Commentaire'
        ));
    }

    public function getName()
    {
        return 'musee_blogbundle_commentairetype';
    }
}
