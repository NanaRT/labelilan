<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocialMediaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('link')
            ->add('icon')
            ->add('organizer','entity', [
		    'class' => 'AppBundle:Organizer',
		    'choice_label' => 'name',
		    'required'     => false])
            ->add('partner','entity', [
		    'class' => 'AppBundle:Partner',
		    'choice_label' => 'name',
		    'required'     => false])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SocialMedia'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'socialMedia';
    }
}
