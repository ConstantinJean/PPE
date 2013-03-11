<?php

namespace Musee\CollectionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Musee\BlogBundle\Form\ImageType;

class ObjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('description', 'textarea')
            ->add('exposition', 'checkbox', array('required' => false))
            ->add('salleStockage', 'entity', array('class' => 'MuseeCollectionBundle:SalleStockage',
													'property' => 'nom',
													'multiple' => false))
            ->add('statutObjet', new StatutObjetType())
            ->add('typeObjet', 'entity', array('class' => 'MuseeCollectionBundle:TypeObjet',
												'property' => 'nom',
												'multiple' => false))
			->add('image', new ImageType(), array('required' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Musee\CollectionBundle\Entity\Objet'
        ));
    }

    public function getName()
    {
        return 'musee_collectionbundle_objettype';
    }
}
