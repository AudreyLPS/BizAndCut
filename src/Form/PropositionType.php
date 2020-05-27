<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Coiffeurs;
use App\Entity\Propositions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PropositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('devis', EntityType::class, [
                'class'=>Devis::class,
                'choice_label'=>'id',
                'placeholder'=>''
            ])
            ->add('coiffeur', EntityType::class, [
                'class'=>Coiffeurs::class,
                'choice_label'=>'id',
                'placeholder'=>''
            ])
            ->add('validationBC')
            ->add('dateProposition')
            ->add('validationentreprise')
            ->add('montant', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre montant de proposition devis est obligatoire"
                    ])
                ]
            ]);
        // ajout d'un soucripteur de formulaire
	    //$builder->addEventSubscriber( new PropositionFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Propositions::class,
        ]);
    }
}
