<?php

namespace App\Controller\Entreprise;

use App\Entity\DevisStatut;
use App\Entity\Propositions;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/entreprise")
 */
class PropositionsController extends AbstractController
{
    /**
	 * @Route("/listepropositions/{idDevis}", name="entreprise.propositions.index")
     */
	public function index(int $idDevis, PropositionsRepository $propositionsRepository):Response
	{
        $results=$propositionsRepository->findBy(array('devis'=>$idDevis));
		return $this->render('entreprise/propositions/index.html.twig', [
			'results' => $results
		]);
    }

    /**
	 * @Route("/listepropositions/set/{id}/{idDevis}", name="entreprise.propositions.accepte")
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







