<?php

namespace Musee\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
		
		$builder -> add('name', 'text', array('required' => true))
				-> add('firstName', 'text', array('required' => true))
			
				-> add('role', 'choice', array(
					'choices'   => array(
					'ROLE_ADMIN'   => 'ROLE_ADMIN',
					'ROLE_CHERCHEUR' => 'ROLE_CHERCHEUR',
					'ROLE_ADHERENT' => 'ROLE_ADHERENT',
					),
					'property_path' => false,
					'multiple'  => false,
					'label' => 'Rôle'
				))
				-> remove('username');

      
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Musee\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'musee_user_registration';
    }
}
