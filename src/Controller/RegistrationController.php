<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Salaries;
use App\Entity\Coiffeurs;
use App\Form\RegistrationFormType;
use App\Security\AppAuthenticator;
use App\Form\RegistrationSalarieType;
use App\Form\RegistrationCoiffeurType;
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
        $user = $typeUser === 'salaries' ? new Salaries() : $typeUser === 'coiffeurs' ? new Coiffeurs() : new User();
        $formType = $typeUser === 'salaries' ? RegistrationSalarieType::class : $typeUser === 'coiffeurs' ? RegistrationCoiffeurType::class : '';
        
        $form = $this->createForm($formType, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
           //dd($form->getData()); 
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

        $template = $typeUser === 'salaries' ? 'register-salaries' : 'register-coiffeurs';

        return $this->render("registration/$template.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}
