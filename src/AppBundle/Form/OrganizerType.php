<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\SocialMedia;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class OrganizerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('systName')
            ->add('description')
			->add('game','entity', [
		    'class' => 'AppBundle:Game',
		    'choice_label' => function ($game) {
		        return $game->getName();
		    },
		    'multiple'=>true,
		    'expanded'=>true]);
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Organizer'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'organizer';
    }
}
