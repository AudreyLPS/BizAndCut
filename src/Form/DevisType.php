<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\DevisStatut;
use App\Entity\Entreprises;
use Symfony\Component\Form\AbstractType;
use App\Repository\DevisStatutRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use App\EventSubscriber\Form\DevisFormSubscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DevisType extends AbstractType
{
    private $security, $devisStatut;

    public function __construct(Security $security, DevisStatutRepository $devisStatutRepository)
    {
        $this->security = $security;
        $this->devisStatut = $devisStatutRepository->find(1);
        
    }

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entreprise = $this->security->getUser();
       
        $builder
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
            ->add('nbHeuresDevis', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "L'heure est obligatoire"
                    ])
                ],
                    'choices'  => [
                        'Une Journée' => 2,
                        'Une demie journée' => 1,
                ],
                'expanded' => true,
                'label_attr'=>[
                    'class'=>'radio-inline'
                ]
            ])
            ->add('entreprise', HiddenType::class, [
                'empty_data'=> $entreprise,
                'data'=>""
            ])
            ->add('devisStatut', HiddenType::class, [
                'empty_data'=> $this->devisStatut,
                'data'=>""
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
