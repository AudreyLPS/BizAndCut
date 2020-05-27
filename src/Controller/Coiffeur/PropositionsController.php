<?php

namespace App\Controller\Coiffeur;

use App\Entity\DevisStatut;
use App\Entity\Propositions;
use App\Form\PropositionType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/coiffeur")
 */
class PropositionsController extends AbstractController
{
    
	/**
	 * @Route("/liste/form/update/{id}", name="coiffeur.propositions.form.update")
	 * @Route("/liste/form", name="coiffeur.propositions.form")
	 */
	 
    
    public function form(PropositionsRepository $propositionsRepository, int $id=null, Request $request, EntityManagerInterface $entityManager):Response
	{
    $type = PropositionType::class;
        $model = $id ? $propositionsRepository->find($id) :  new Propositions();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $id ? null : $entityManager->persist($model);
            $entityManager->flush();
            
			// message de confirmation
			$message = "La proposition a été envoyé";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }

        return $this->render('coiffeur/propositions/form.html.twig',[
            'form'=> $form->createView()
        ]); 
    }
}







