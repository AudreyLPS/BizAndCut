<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\Coiffeurs;
use App\Entity\Propositions;
use App\Entity\Profil;
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

class ProfilType extends AbstractType
{
    public function __construct(Security $security, DevisRepository $er)
    {
        $this->security = $security;
        $this->er= $er;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $coiffeur = $this->security->getUser();
        $idDevis= $options['idDevis'];
        $devis = $this->er ->find($idDevis);
        
        $builder

            ->add('rib', HiddenType::class, [
                'empty_data'=> $coiffeur,
                'data'=>""
            ])
            ->add('note', HiddenType::class, [
                'empty_data'=> $devis,
                'data'=>""
            ])
           
            ->add('diplome', HiddenType::class, [
                'empty_data'=> 0,
            ]);
        
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
            'idDevis'=> '',
        ]);
    }
}
