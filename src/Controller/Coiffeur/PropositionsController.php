<?php

namespace App\Controller\Coiffeur;

use App\Entity\DevisStatut;
use App\Entity\Propositions;
use App\Form\PropositionType;
use App\Repository\UserRepository;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/coiffeur")
 */
class PropositionsController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
	}
	
	/**
	 * @Route("/liste/form/{id}", name="coiffeur.propositions.form")
	 */
	 
    
    public function form(PropositionsRepository $propositionsRepository,UserRepository $userRepository, int $id, Request $request, EntityManagerInterface $entityManager):Response
	{
		
		$coiffeur=$userRepository->find($this->security->getUser());

        $type = PropositionType::class;
        $model = new Propositions();
		if($coiffeur->getValidationBC() == 1){
			$model->setValidationBC(1);
		}
		
        $form = $this->createForm($type, $model, array('idDevis'=>$id));
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($model);
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

    /**
	 * @Route("/proposition/delete/{id}", name="coiffeur.propositions.delete")
	 */
	public function delete(PropositionsRepository $propositionsRepository, EntityManagerInterface $entityManager, int $id):Response
	{
		/*
		 * avec doctrine, pour supprimer une entité, il faut la sélectionner au préalable
		 * méthode remove pour DELETE
		 */
		$entity = $propositionsRepository->find($id);
		$entityManager->remove($entity);
		$entityManager->flush();

		// message de confirmation et redirection
		$this->addFlash('notice', "L'événement' a été supprimé");
		return $this->redirectToRoute('coiffeur.propositions.index');
	}
}







