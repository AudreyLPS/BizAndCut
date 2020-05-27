<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Evenements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateEvenement')
            ->add('heureDEvenement')
            ->add('heureFEvenement')
            ->add('nbCoiffeursEvenement')
            ->add('descriptionEvenement')
            ->add('devis', EntityType::class, [
                'class'=>Devis::class,
                'choice_label'=>'id',
                'placeholder'=>''
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
