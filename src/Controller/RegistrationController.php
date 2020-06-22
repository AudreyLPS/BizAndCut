<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Admins;
use App\Entity\Coiffeurs;
use App\Entity\Entreprises;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\AppAuthenticator;
use App\Form\RegistrationAdminType;
use App\Repository\AdminsRepository;
use App\Form\RegistrationCoiffeurType;
use App\Form\RegistrationEntrepriseType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
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
    public function register(AdminsRepository $adminRepository, UserRepository $userRepository,MailerInterface $mailer, string $typeUser, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        if($typeUser === 'coiffeurs'){
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
            
            //envoi d'email
            $admins=$adminRepository->findAll();
            
            foreach ($admins as $admin) { 
                if($admin->getNotif() == 1){
                    $to = $admin->getEmail();
                    $roles = $user->getRoles();
                    $unRole='';
                    foreach ($roles as $role) {
                        if ($role == 'ROLE_COIFFEURS'){$unRole='Coiffeur';}
                        if ($role == 'ROLE_ADMINS'){$unRole='Administrateur';}
                        if ($role == 'ROLE_SALARIES'){$unRole='Salarié';}
                        if ($role == 'ROLE_ENTREPRISES'){$unRole='Entreprise';}
                     }
                    $subject= 'NEW '.$unRole;
                    $message = (new TemplatedEmail())
                    ->from('alcnm2018@gmail.com')
                    ->to($to)
                    ->subject($subject)
                    ->textTemplate('emailing/registerMail.txt.twig')//cibler un template twig
                    ->context([ // permet d'envoyer des information a la vue 
                        'nom' => $form->get('nom')->getData() ,
                        'prenom'  => $form->get('prenom')->getData(),
                        'mail'  => $form->get('email')->getData(),
                        'role'=>$unRole
                        
                    ]);  
                    $mailer->send($message);
                }
                
            }             
            // do anything else you need here, like send an email

            return $this->redirectToRoute('homepage.index');
        }

        //dd($typeUser,$template);
        return $this->render("registration/$template.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}
