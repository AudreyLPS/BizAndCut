<?php

namespace App\Controller\Bizandcut;

use App\Repository\DevisRepository;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Bizandcut\PropositionsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
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
        $proposition->setValidationBC(1);
        
        $entityManager->flush();

		    $results= $propositionsRepository->findAll();
		return $this->render('bizandcut/propositions/index.html.twig', [
			'results' => $results,
		]);
    }

        /**
	  * @Route("/listepropositions/refuse/{id}/{idDevis}", name="bizandcut.propositions.refuse")
    */
	public function refuse(int $id,int $idDevis ,DevisStatutRepository $dsRepository, DevisRepository $devisRepository,PropositionsRepository $propositionsRepository):Response
  {
       
     $entityManager = $this->getDoctrine()->getManager();
        $proposition=$propositionsRepository->find($id);
        $proposition->setValidationBC(0);
        
        $entityManager->flush();

		    $results= $propositionsRepository->findAll();
		return $this->render('bizandcut/propositions/index.html.twig', [
			'results' => $results,
		]);
    }
}







