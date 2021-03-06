<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\DevisStatut;
use App\Entity\Entreprises;
use App\Form\EvenementType;
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
        
        $heures = [ '7h' => '7h','8h' => '8h','9h' => '9h','10h' => '10h','11h' => '11h','12h' => '12h','13h' => '13h','14h' => '14h','15h' => '15h','16h' => '16h',
                    '17h' => '17h','18h' => '18h','19h' => '19h','20h' => '20h'];
        $builder
            ->add('nbParticipants',NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre RIB est obligatoire"
                    ])
                ]
            ])  
            ->add('nbInscrit', HiddenType::class, [
                'empty_data'=> 0,
                'data'=>""
            ])
            ->add('date', DateType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "La date est obligatoire"
                    ])
                ]
            ])
            ->add('entreprise', HiddenType::class, [
                'empty_data'=> $entreprise,
                'data'=>''
            ])
            ->add('heureDebut', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre civilité est obligatoire"
                    ])
                ],
                'choices'  => $heures
            ])
            ->add('heureFin', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre civilité est obligatoire"
                    ])
                ],
                'choices'  => $heures
            ])
            ->add('nbCoiffeurs', HiddenType::class, [
                'empty_data'=> 1,
                'data'=>""
            ])
            ->add('libelle')
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
