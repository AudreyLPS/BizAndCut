<?php

namespace App\Controller\Coiffeur;

use App\Entity\Profil;
use App\Form\ProfilType;
use App\Entity\DevisStatut;
use App\Entity\Propositions;
use App\Form\PropositionType;
use App\Repository\DevisRepository;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use App\Controller\Coiffeur\ProfilController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/coiffeur")
 */
class ProfilController extends AbstractController
{
    
	/**
	 * @Route("/profil", name="coiffeur.profil.index")
	 */
	public function index(DevisRepository $devisRepository, PropositionsRepository $propositionsRepository):Response
	{
		$results= $devisRepository->findAll();
		$propositions= $propositionsRepository -> findAll();
		return $this->render('coiffeur/profil/index.html.twig', [
			'results' => $results,
			'propositions' => $propositions,
		]);
    }
    


    /**
	 * @Route("/profil/form/{id}", name="coiffeur.profil.form")
	 */

    public function form(ProfilRepository $profilRepository, int $id, Request $request, EntityManagerInterface $entityManager):Response
	{
       /*  $type = ProfilType::class;
        $model = new Profil();
        
        $form = $this->createForm($type, $model, array('idDevis'=>$id));
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($model);
            $entityManager->flush();
            
			// message de confirmation
			$message = "Votre profil a été mis à jour";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }
        
        return $this->render('coiffeur/profil/form.html.twig',[
            'form'=> $form->createView()
        ]);  */



        $profil = new Profil();
        
        $form = $this->createForm(ProfilType::class, $profil);
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this-> getDoctrine()->getManager();

            $entityManager->persist($profil);
            $entityManager->flush();
            
			// message de confirmation
			$message = "Votre profil a été mis à jour";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }
        $formView = $form->createView();
        
        return $this->render('coiffeur/profil/form.html.twig',
            array('form'=>$formView)); 
    }
}







