<?php

namespace App\Form;

use App\Entity\Profil;
use App\Form\ProfilType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProfilType extends AbstractType
{
    private $security;

    public function _construct(Security $security)
    {
        $this->security = $security;
    }

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $bla= $this->security->getUser(); 
        $builder
            ->add('rib', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre RIB est obligatoire"
                    ])
                ]
            ])
            ->add('note')
            ->add('diplome', ChoiceType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre diplome est obligatoire"
                    ])
                ],
                    'choices'  => [
                        'CAP' => 'CAP',
                        'BP' => 'BP',
                        'MC' => 'MC',
                        'BM' => 'BM',
                        'CQP' => 'CQP',
                        'BTS' => 'BTS',
                ],
                'expanded' => true,
                'label_attr'=>[
                    'class'=>'radio-inline'
                ]
            ])
            ->add('user', HiddenType::class,[
                'empty_data'=>$user,
                'data'=>""
            ])
        ;
        
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}