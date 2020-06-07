<?php

namespace App\Controller\Coiffeur;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Entity\Participations;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ParticipationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/coiffeur")
 */

class ParticipationsController extends AbstractController 
{
    /**
	 * @Route("/participation", name="coiffeur.participation.index")
	 */
	public function index(ParticipationsRepository $participaionsRepository):Response
	{
		$results= $participaionsRepository->findAll();
		$participaionsRepository= $participaionsRepository -> findAll();
		return $this->render('coiffeur/devis/index.html.twig', [
			'results' => $results,
		]);
	}

	/**
	 * @Route("/participations/accepte/{idDevis}/{idCoiffeur}", name="coiffeur.participations.accepte")
	 */
	public function accepte(ParticipationsRepository $participaionsRepository, int $idCoiffeur, int $idDevis):Response
	{
		
		$entityManager= $this->getDoctrine()->getManager();
		$participation= new Participations();
		$participation->setEvenementId($idDevis);
		$participation->setCoiffeurId($idCoiffeur);
		

		$entityManager->persist($participation);
		$entityManager->flush();
		return $this->redirectToRoute('coiffeur.devis.index');
        
	}

	/**
	 * @Route("/participations/decline/{id}", name="coiffeur.participations.decline")
	 */
	public function decline(ParticipationsRepository $participaionsRepository, int $id):Response
	{
		
		$entityManager= $this->getDoctrine()->getManager();
		$entity= $participaionsRepository->find($id);
		$entityManager->remove($entity);
		$entityManager->flush();
		$this->addFlash('notice_danger', 'Le produit a été supprimé');
		return $this->redirectToRoute('coiffeur.devis.index');
        
	}

    
}
