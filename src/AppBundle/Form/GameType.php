<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\ImageType;
use AppBundle\Entity\Image;

class GameType extends AbstractType
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
            ->add('category','entity', [
		    'class' => 'AppBundle:Category',
		    'choice_label' => 'name'])
            ->add('organizer','entity', [
		    'class' => 'AppBundle:Organizer',
		    'choice_label' => 'name'])
            ->add('description')
			->add('places', 'integer', [
				'required'=>false])
			->add('nbplayers', 'integer', [
				'required'=>false])
			->add('rules')
			->add('rulesWeight')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'game';
    }
}
