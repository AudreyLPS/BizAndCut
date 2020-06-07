<?php

namespace App\Controller\Coiffeur;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PropositionsRepository;
use App\Repository\ParticipationsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/coiffeur")
 */

class DevisController extends AbstractController 
{
    /**
	 * @Route("/listdevis", name="coiffeur.devis.index")
	 */
	public function index(DevisRepository $devisRepository, PropositionsRepository $propositionsRepository, ParticipationsRepository $participationsRepository):Response
	{
		$results= $devisRepository->findAll();
		$propositions= $propositionsRepository -> findAll();
		$participations= $participationsRepository -> findAll();
		return $this->render('coiffeur/devis/index.html.twig', [
			'results' => $results,
			'propositions' => $propositions,
			'participations' => $participations,

		]);
	}
	

    

   
    
}
