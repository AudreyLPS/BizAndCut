<?php

namespace App\Form;

use App\Entity\Coiffeurs;
use App\Form\InscCoifType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use App\EventSubscriber\Form\InscCoifFormSubscriber;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class InscCoifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civiliteCoiffeur', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre civilité est obligatoire"
                    ])
                ]
            ])

            ->add('nomCoiffeur', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre nom est obligatoire"
		            ])
	            ]
            ])
            
            ->add('prenomCoiffeur', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre prénom est obligatoire"
		            ])
	            ]
            ])
                            
            ->add('nbAnneesExp', NumberType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre nombre d'expérience est obligatoire"
		            ])
	            ]
            ])
            
            ->add('typeCoiffeur', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre type de coiffure est obligatoire"
		            ])
	            ]
            ])

            ->add('emailCoiffeur', EmailType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "L'email est obligatoire"
            		]),
		            new Email([
		            	'message' => "L'email est incorrect"
		            ])
	            ]
            ])
            
            ->add('telephoneCoiffeur', NumberType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre téléphone est obligatoire"
		            ])
	            ]
            ])
            
            ->add('adresseCoiffeur', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre adresse est obligatoire"
		            ])
	            ]
            ])
            
            ->add('villeCoiffeur', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre ville est obligatoire"
		            ])
	            ]
            ])
            
            ->add('cpCoiffeur', NumberType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre code postale est obligatoire"
		            ])
	            ]
            ])

            ->add('distanceCoiffeur', NumberType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre distance est obligatoire"
		            ])
	            ]
            ])

            ->add('mdpCoiffeur', PasswordType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Votre mot de passe est obligatoire"
		            ])
	            ]
            ]);

        // ajout d'un soucripteur de formulaire
	    $builder->addEventSubscriber( new InscCoifFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Coiffeurs::class,
        ]);
    }
}