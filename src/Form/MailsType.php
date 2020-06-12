<?php

namespace App\Form;

use App\Entity\Mails;
use Symfony\Component\Form\AbstractType;
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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MailsType extends AbstractType{
 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
        ->add('date', HiddenType::class, [
            'empty_data'=> new \DateTime(),
            'data'=>""
        ])
        ->add('nom')
        ->add('telephone')
        ->add('email')
        ->add('message', TextareaType::class)
        ->add('lu', HiddenType::class, [
            'empty_data'=> 0,
            'data'=>""
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mails::class,
        ]);
    }
}
