<?php

namespace App\Form;

use App\Entity\Proposition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PropositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntrepriseProposition')
            ->add('adresseEntrepriseProposition')
            ->add('dateProposition')
            ->add('heureProposition')
            ->add('heureFProposition')
            ->add('nbCoiffeursProposition')
            ->add('montantProposition', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre montant de proposition devis est obligatoire"
                    ])
                ]
            ]);
        // ajout d'un soucripteur de formulaire
	    $builder->addEventSubscriber( new PropositionFormSubscriber() );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Propositions::class,
        ]);
    }
}
