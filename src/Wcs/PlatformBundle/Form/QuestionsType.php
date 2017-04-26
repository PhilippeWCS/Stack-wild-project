<?php

namespace Wcs\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intituleQuestion')
            ->add('contenu', TextareaType::class, array('label'=>'Votre message'))
            ->add('categories', EntityType::class, array(
                'label' => 'Choix des catégories',
                'class' => 'WcsPlatformBundle:Categories',
                'multiple' => true,
                'choice_label' => function($categories) {
                    return $categories->getIntitule();
                },


                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wcs\PlatformBundle\Entity\Questions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wcs_platformbundle_questions';
    }


}
