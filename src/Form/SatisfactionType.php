<?php

namespace App\Form;

use App\Entity\Satisfaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class SatisfactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $coiffeur=0;
        $devis=0;
        $builder
            ->add('note')
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
