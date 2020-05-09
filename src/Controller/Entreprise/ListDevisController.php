<?php

namespace App\Controller\Entreprise;

use App\Entity\Devis;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/entreprise")
 */
class ListDevisController extends AbstractController
{
	/**
	 * @Route("/listdevis", name="entreprise.devis.index")
	 */
	public function index(DevisRepository $devisRepository):Response
	{
		$results= $devisRepository->findAll();
		return $this->render('entreprise/devis/index.html.twig', [
			'results' => $results,
		]);
	}
}








