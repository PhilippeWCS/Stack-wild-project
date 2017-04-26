<?php

namespace Wcs\PlatformBundle\Form;

use function Sodium\add;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Wcs\PlatformBundle\Entity\User;

class ProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );

        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = array(reset($options['validation_groups']));
        }

        $builder
            ->add('nom', TextType::class, array('label' => 'Nom'))
            ->add('prenom', TextType::class, array('label' => 'Prénom'))
            ->add('email', EmailType::class, array('label' => 'Email'))
            ->add('imgProfil', FileType::class, array('label' => 'Avatar', 'data_class' => null))
            ->add('urlLinkedin', UrlType::class, array('label' => 'Profil LinkedIn'))
            ->add('urlTweeter', UrlType::class, array('label' => 'Profil Tweeter'))
            ->add('urlGithub', UrlType::class, array('label' => 'Profil Github'))
            ->add('categories', EntityType::class, array(
                'class' => 'WcsPlatformBundle:Categories',
                'label' => 'Choix des catégories',
                'multiple' => true,
                'choice_label' => function($categories) {
                    return $categories->getIntitule();
                },
            ))
            ->add('villeEcole', TextType::class, array('label' => "Ville de l'école"))
            ->add('profil', ChoiceType::class, array(
                'choices' => User::getProfils(),
            ))
            ->add('emploi', TextType::class, array('label' => 'Emploi'))
            ->add('entreprise', TextType::class, array('label' => 'Entreprise'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wcs\PlatformBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wcs_platformbundle_profile';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
