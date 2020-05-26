<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Coiffeurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
#use App\EventSubscriber\Form\Insc_coifEventSubscriber;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationCoiffeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		/*	
        ->add('civilite', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre civilité est obligatoire"
                ])
            ]
        ])

        ->add('nom', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre nom est obligatoire"
                ])
            ]
        ])
        
        ->add('prenom', TextType::class, [
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
        
        ->add('type', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre type de coiffure est obligatoire"
                ])
            ]
        ])

        ->add('email', EmailType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "L'email est obligatoire"
                ]),
                new Email([
                    'message' => "L'email est incorrect"
                ])
            ]
        ])
        
        ->add('telephone', NumberType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre téléphone est obligatoire"
                ])
            ]
        ])
        
        ->add('adresse', TextareaType::class, [
            
            'attr' => [
                'rows' => 1, 'cols' => 66
            ]
        ])
        
        ->add('ville', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre ville est obligatoire"
                ])
            ]
        ])
        
        ->add('cp', NumberType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre code postale est obligatoire"
                ])
            ]
        ])

        ->add('distance', NumberType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre distance est obligatoire"
                ])
            ]
        ])

        ->add('plainPassword', PasswordType::class, [
            // instead of being set onto the object directly,
            // this is read and encoded in the controller
            'mapped' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter a password',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
            ],
        ])
        
        
        
        ->add('deleted');*/

        ->add('email')
        ->add('nom')
        ->add('prenom')
        ->add('civilite', ChoiceType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre civilité est obligatoire"
                ])
            ],
                'choices'  => [
                    'Mr' => 'monsieur',
                    'Mme' => 'madame',
            ],
            'expanded' => true,
            'label_attr'=>[
                'class'=>'radio-inline'
            ]
        ])
        ->add('nbAnneesExp')
        ->add('type', ChoiceType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => "Votre civilité est obligatoire"
                ])
                
            ],
                'choices'  => [
                    'Indépendant' => 'independant',
                    "Salarié" => "salarie",
            ],
            'expanded' => true,
            'label_attr'=>[
                'class'=>'radio-inline'
            ]
        ])
        ->add('telephone')
        ->add('adresse')
        ->add('ville')
        ->add('cp')
        ->add('distance')
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'mapped' => false,
            'invalid_message' => 'Les mots de passe doivent être les mêmes',
            'constraints' => [
                new NotBlank([
                    'message' => 'Le mot de passe est obligatoire',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Le mot de passe doit contenir {{ limit }} caratères minimum',
                    'max' => 4096,
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Coiffeurs::class,
        ]);
    }
}
