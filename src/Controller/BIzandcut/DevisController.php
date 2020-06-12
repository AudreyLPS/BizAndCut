<?php

namespace App\Controller\Bizandcut;

use App\Entity\Devis;

use App\Repository\DevisRepository;
use App\Repository\PropositionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/bizandcut")
 */

class DevisController extends AbstractController
{
	/**
	 * @Route("/devis", name="bizandcut.devis.index")
	 */
	public function index(DevisRepository $devisRepository):Response
	{
        $devis= $devisRepository->findAll();
        
		return $this->render('bizandcut/devis/index.html.twig', [
			'results' => $devis,
		]); 
    } 

	/**
	 * @Route("/devis/proposition/{id}", name="bizandcut.devis.proposition")
	 */
	public function proposition(DevisRepository $devisRepository, PropositionsRepository $propositionsRepository, int $id):Response
	{
        $devis= $devisRepository->find($id);
        $results= $propositionsRepository->findBy(array('devis'=>$devis));
        
		return $this->render('bizandcut/propositions/index.html.twig', [
			'results' => $results,
		]); 
    } 
    
}







