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
            ->add('nomEntreprise', TextType::class, [
            	'constraints' => [
            		new NotBlank([
            		    'message' => "Le nom de l'entreprise est obligatoire"
		            ])
	            ]
            ])


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