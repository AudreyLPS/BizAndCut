<?php

namespace App\Form;

use App\Entity\Entreprises;
use App\EventSubscriber\Form\Insc_entreFormSubscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
#use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class Insc_entreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_entreprise', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Le nom de l'entreprise est obligatoire"
		            ])
	            ]
            ])

            ->add('prenom_nom_user_entreprise', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le nom et prénom d'utilisateur de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('fonction_entreprise', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "La fonction de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('siren_entreprise', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le siren de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('statut_entreprise', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le statut de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('email_entreprise', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "L'email de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('telephone_entreprise', TelType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le téléphone de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('adresse_entreprise', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "L'adresse' de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('ville_entreprise', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "La ville de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('cp_entreprise', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le code postal de l'entreprise est obligatoire"
                    ])
                ]
            ])

            ->add('mdp_entreprise', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être les mêmes',
                //'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer Mot de passe']
            ]);


	   //      ->add('country', EntityType::class, [
				// 'class' => Country::class,
	   //          'choice_label' => 'name',
	   //          'placeholder' => '',
	   //          'constraints' => [
	   //          	new NotBlank([
	   //          	    'message' => 'Le pays est obligatoire'
		  //           ])
       //          ]
    //         ])
        ;

        // ajout d'un soucripteur de formulaire
	    $builder->addEventSubscriber( new Insc_entreFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprises::class,
        ]);
    }
}