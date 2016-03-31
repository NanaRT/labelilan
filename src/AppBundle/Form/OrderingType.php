<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Entity\Pizza;

class OrderingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		foreach($options['data'] as $ordering)
		{
			$builder
	            ->add('number')
				->add('pizza','entity',[
				    'class' => 'AppBundle:Pizza',
				    'choice_label' => function ($pizza) {
				        return $pizza->getName();
				    },
				    'disabled'=>true
		    	]);
			var_dump($builder);
		}
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_ordering';
    }
}
