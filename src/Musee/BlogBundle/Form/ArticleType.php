<?php

namespace Musee\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text')
			->add('image', new ImageType(), array('required' => false))
            ->add('contenu', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
            ->add('auteur', 'text')
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Musee\BlogBundle\Entity\Article'
        ));
    }

    public function getName()
    {
        return 'musee_blogbundle_articletype';
    }
}
