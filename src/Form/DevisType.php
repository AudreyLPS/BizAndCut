<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\DevisStatut;
use App\Entity\Entreprises;
use Symfony\Component\Form\AbstractType;
use App\Repository\DevisStatutRepository;
use Symfony\Component\Form\FormBuilderInterface;
use App\EventSubscriber\Form\DevisFormSubscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            /*->add('numeroDevis', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Le nom de l'entreprise est obligatoire"
                    ])
                ]
            ])*/
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
            ->add('entreprise', EntityType::class, [
                'class'=> Entreprises::class,
                'choice_label'=>'nomEntreprise',
                'placeholder'=>''
            ])
            ->add('devisStatut', EntityType::class, [
                'class'=>DevisStatut::class,
                'choice_label'=>'texteDevisStatut',
                'placeholder'=>'',
                'data'=> 2
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
