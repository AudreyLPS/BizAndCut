<?php

namespace App\Form;

use App\Entity\Satisfaction;
use App\Repository\DevisRepository;
use App\Repository\CoiffeursRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\ParticipationsRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class SatisfactionType extends AbstractType

{
    public function __construct(CoiffeursRepository $coiffeurRepository, DevisRepository $devisRepository,ParticipationsRepository $participationRepository)
    {
        $this->participationRepository = $participationRepository;
        $this->coiffeurRepository = $coiffeurRepository;
        $this->devisRepository = $devisRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $notes = ['0' => '0','1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10'];
        $devisId = $options["label"];
        $participations = $this->participationRepository->findBy(array('evenementId'=>$devisId));
        foreach ($participations as $participation) { 
            $coiffeurId = $participation->getCoiffeurId();
        }        

        $coiffeur=$this->coiffeurRepository->find($coiffeurId);
        $devis=$this->devisRepository->find($devisId);

        $builder
            ->add('note', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "La note est obligatoire"
                    ])
                ],
                'choices'  => $notes
            ])
            ->add('coiffeur', HiddenType::class, [
                'empty_data'=> $coiffeur,
                'data'=>''
            ])
            ->add('devis', HiddenType::class, [
                'empty_data'=> $devis,
                'data'=>''
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Satisfaction::class,
        ]);
    }

    
}
