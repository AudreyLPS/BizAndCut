<?php

namespace App\Controller\Bizandcut;

use App\Repository\DevisRepository;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use App\Controller\Bizandcut\PropositionsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bizandcut")
 */
class PropositionsController extends AbstractController
{
    /**
	   * @Route("/listepropositions", name="bizandcut.propositions.index")
     */
	public function index(PropositionsRepository $propositionsRepository):Response
	{
        $results=$propositionsRepository->findAll();
		return $this->render('bizandcut/propositions/index.html.twig', [
			'results' => $results
		]);
    }

    /**
	  * @Route("/listepropositions/set/{id}/{idDevis}", name="bizandcut.propositions.accepte")
    */
	public function accepte(int $id,int $idDevis ,DevisStatutRepository $dsRepository, DevisRepository $devisRepository,PropositionsRepository $propositionsRepository):Response
  {
       
     $entityManager = $this->getDoctrine()->getManager();
        $proposition=$propositionsRepository->find($id);
        $proposition->setValidationEntreprise(1);

        $devisStatus = $dsRepository->find(2);
        $devis=$devisRepository->find($idDevis);
        $devis->setDevisStatut($devisStatus);
        
        $entityManager->flush();

		$results= $devisRepository->findAll();
		return $this->render('entreprise/devis/index.html.twig', [
			'results' => $results,
		]);
    }
}







