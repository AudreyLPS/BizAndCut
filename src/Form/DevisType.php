<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\DevisStatut;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\EventSubscriber\Form\DevisFormSubscriber;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entrepriseId', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le nom de l'entreprise est obligatoire"
                    ])
                ]
                ], [
                    'empty_data' => '1',
                    ])
            ->add('numeroDevis', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le nom de l'entreprise est obligatoire"
                    ])
                ]
            ])
            ->add('nbParticipantsDevis', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le nombre de participant est obligatoire"
                    ])
                ]
            ])
            ->add('dateEvenementDevis', DateType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "La date est obligatoire"
                    ])
                ]
            ])
            ->add('nbHeuresDevis', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "La durée est obligatoire"
                    ])
                ]
            ])
            ->add('devisStatutId', NumberType::class, [
                'constraints'=>[
                    new NotBlank([
                        'message'=>'Le statut est obligatoire'
                    ])
                ]
            ])
        ;
        // ajout d'un soucripteur de formulaire
	    $builder->addEventSubscriber( new DevisFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
