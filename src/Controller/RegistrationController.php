<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Admins;
use App\Entity\Salaries;
use App\Entity\Coiffeurs;
use App\Entity\Entreprises;
use App\Form\RegistrationFormType;
use App\Security\AppAuthenticator;
use App\Form\RegistrationAdminType;
use App\Form\RegistrationSalarieType;
use App\Form\RegistrationCoiffeurType;
use App\Form\RegistrationEntrepriseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register/{typeUser}", name="app_register")
     */
    public function register(string $typeUser, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        if ( $typeUser === 'salaries'){
            $user= new Salaries();
            $formType=RegistrationSalarieType::class;
            $template='register-salaries';
        }
        elseif($typeUser === 'coiffeurs'){
            $user= new Coiffeurs();
            $formType=RegistrationCoiffeurType::class;
            $template='register-coiffeurs';
        }
        elseif($typeUser === 'admins'){
            $user= new Admins();
            $formType=RegistrationAdminType::class;
            $template='register-admins';
        }
        else{
            $user= new Entreprises();
            $formType=RegistrationEntrepriseType::class;
            $template='register-entreprises';
        }

        //dd($user, $typeUser);
        $form = $this->createForm($formType, $user);
        $form->handleRequest($request);
        //dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('homepage.index');
        }

        //dd($typeUser,$template);
        return $this->render("registration/$template.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}
