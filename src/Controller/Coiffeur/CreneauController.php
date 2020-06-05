<?php

namespace App\Controller\Coiffeur;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PropositionsRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Coiffeur\CreneauController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/coiffeur")
 */

class CreneauController extends AbstractController 
{
    /**
	 * @Route("/creneau", name="coiffeur.creneau.index")
	 */
	public function index(DevisRepository $devisRepository, PropositionsRepository $propositionsRepository):Response
	{
		$results= $devisRepository->findAll();
		$propositions= $propositionsRepository -> findAll();
		return $this->render('coiffeur/devis/index.html.twig', [
			'results' => $results,
			'propositions' => $propositions,
        ]);
        
    }
    
	

    

   
    
}
