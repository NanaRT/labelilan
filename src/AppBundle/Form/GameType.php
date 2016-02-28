<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('category',EntityType::class, [
		    'class' => 'AppBundle:Category',
		    'choice_label' => 'name'])
            ->add('organizer',EntityType::class, [
		    'class' => 'AppBundle:Organizer',
		    'choice_label' => 'name'])
            ->add('description')
			->add('places', IntegerType::class, [
				'required'=>false])
			->add('nbplayers', IntegerType::class, [
				'required'=>false])
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
