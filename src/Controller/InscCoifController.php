<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscCoifController extends AbstractController
{
    /**
     * @Route("/insc_coif", name="insc_coif.index")
     */

    public function index(Request $request, EntityManagerInterface $entityManager):Response
    {

        $results = $productRepository->findAll();

        return $this->render('insc_coif/index.html.twig', [
            'controller_name' => 'InscCoifController',
        ]);


        $type = InscCoifType::class;
		$model = new Coiffeurs();
		$form = $this->createForm($type, $model);
        $form->handleRequest($request);
        
        
		if($form->isSubmitted() && $form->isValid()){
			$id ? null : $entityManager->persist($model);
			$entityManager->flush();

			
			$message = "Le coiffeur a été ajoutée";
			$this->addFlash('notice', $message);

			
        }
        
        return $this->render('insc_coif/index.html.twig', [
			'form' => $form->createView()
		]);
    }
}
