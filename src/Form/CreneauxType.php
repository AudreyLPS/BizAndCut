<?php

namespace App\Form;

use App\Entity\Rdv;
use App\Repository\PlanningRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class CreneauxType extends AbstractType
{

    private $security, $planningRepository;
    public function __construct(Security $security, PlanningRepository $planningRepository)
    {
        $this->security = $security;
        $this->planningRepository = $planningRepository;
        //dd($this->getRequest()->attributes->get('_route'));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $planning_id = $options["label"];

        $planning = $this->planningRepository->find($planning_id);
        //dd($planning);

        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('heureCreneau')

            ->add('planning', HiddenType::class, [
                'empty_data'=> $planning,
                'data'=>''
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Rdv::class,
        ]);
    }

    
}
