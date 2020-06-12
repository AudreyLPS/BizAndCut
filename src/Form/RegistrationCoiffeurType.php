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
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
        ->add('validationBC', HiddenType::class, [
            'empty_data'=> 0,
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
