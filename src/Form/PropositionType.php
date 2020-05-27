<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Coiffeurs;
use App\Entity\Propositions;
use App\Repository\DevisRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PropositionType extends AbstractType
{
    public function __construct(Security $security, DevisRepository $devisRepository)
    {
        $this->security = $security;
        $this->devis = $devisRepository->find(1);
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $coiffeur = $this->security->getUser();
        $builder
            ->add('coiffeur', HiddenType::class, [
                'empty_data'=> $coiffeur,
                'data'=>""
            ])
            ->add('devis', EntityType::class, [
                'class'=>Devis::class,
                'choice_label'=>'id',
                'placeholder'=>''
            ])
           
            ->add('validationBC', HiddenType::class, [
                'empty_data'=> 0,
            ])
            ->add('dateProposition', HiddenType::class, [
                'empty_data'=> new \DateTime(), 'data' =>'',
            ])

        
            ->add('validationentreprise', HiddenType::class, [
                'empty_data'=> 0,
            ])
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
