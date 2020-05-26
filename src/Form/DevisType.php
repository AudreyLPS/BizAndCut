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
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entreprise = $this->security->getUser();
        //dd($user->getId());
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
                        'message' => "Votre civilité est obligatoire"
                    ])
                ],
                    'choices'  => [
                        'Une Journée' => 1,
                        'Une demie journée' => 0.5,
                ],
                'expanded' => true,
                'label_attr'=>[
                    'class'=>'radio-inline'
                ]
            ])
            ->add('entreprise', HiddenType::class, [
                'empty_data'=> $entreprise,
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
