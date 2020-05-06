<?php

namespace App\Controller;

use App\Entity\Entreprises;
use App\Form\Insc_entreType;
use App\Repository\Insc_entreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Insc_entreController extends AbstractController
{

	/**
	 * @Route("/insc_entre", name="insc_entre.form")
	 */
	public function form(Request $request, EntityManagerInterface $entityManager, int $id = null
		#, Insc_entreRepository $insc_entreRepository
	):Response
	{
		// affichage d'un formulaire
		$type = Insc_entreType::class;
		$model = new Entreprises();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);

		// si le formulaire est valide
		if($form->isSubmitted() && $form->isValid()){
			$id ? null : $entityManager->persist($model);
			$entityManager->flush();

			// message de confirmation
			$message = "L'entreprise a été ajoutée";
			$this->addFlash('notice', $message);

			// redirection vers autre page
			//return $this->redirectToRoute('insc_entre.index');
		}

		return $this->render('insc_entre/form.html.twig', [
			'form' => $form->createView()
		]);
	}
}