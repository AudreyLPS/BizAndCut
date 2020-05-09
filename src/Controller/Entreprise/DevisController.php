<?php

namespace App\Controller\Entreprise;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/entreprise")
 */

class DevisController extends AbstractController 
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
    

    /**
        * @Route("/adddevis", name="entreprise.devis.form")
    */
    
    public function formEvenement(Request $request, EntityManagerInterface $entityManager, int $id = null):Response {

        $type = DevisType::class;
		$model = new Devis();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $id ? null : $entityManager->persist($model);
            $entityManager->flush();
            
			// message de confirmation
			$message = "Le devis a été envoyé";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }

        return $this->render('entreprise/devis/form.html.twig',[
            'form'=> $form->createView()
        ]); 

    }
    
}
