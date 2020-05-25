<?php

namespace App\Form;

use App\Entity\Coiffeurs;
use App\Form\Insc_coifType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Image;
use App\EventSubscriber\Form\Insc_coifFormSubscriber;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class Insc_coifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {	
		$builder
			
            ->add('civiliteCoiffeur', ChoiceType::class, [
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
            
            
			->add('typeCoiffeur', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre civilité est obligatoire"
					])
					
				],
					'choices'  => [
						'Coiffeur indépendant' => 'Coiffeur indépendant',
						"Salarié d'un salon de coiffure" => "Salarié d'un salon de coiffure",
				],
				'expanded' => true,
				'label_attr'=>[
					'class'=>'radio-inline'
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
            
            ->add('adresseCoiffeur', TextareaType::class, [
            	
				'attr' => [
					'rows' => 1, 'cols' => 66
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
			])
			
			
			->add('deletedCoiffeur', TextareaType::class, [
			]);

        // ajout d'un soucripteur de formulaire
	    $builder->addEventSubscriber( new Insc_coifFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Coiffeurs::class,
        ]);
	}

	/* public function create($data)
    {
		$data = ['deletedCoiffeur' => 1];
		$form =$this->createFormBuilder($data)
			->add('deletedCoiffeur', TextareaType::class[

		]);
	} */
	
}