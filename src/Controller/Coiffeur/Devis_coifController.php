<?php

namespace App\Controller\Coiffeur;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/coiffeur")
 */

class Devis_coifController extends AbstractController 
{
    /**
	 * @Route("/listdevis", name="coiffeur.devis.index")
	 */
	public function index(DevisRepository $devisRepository):Response
	{
        $results= $devisRepository->findAll();
		return $this->render('coiffeur/devis/index.html.twig', [
			'results' => $results,
		]);
    }
    

    /**
        * @Route("/devis/form", name="coiffeur.devis.form")
        * @Route("/devis/form/update/{id}", name="coiffeur.devis.form.update")
    */
    
    public function formEvenement(Request $request, EntityManagerInterface $entityManager, int $id = null, DevisRepository $devisRepository):Response {

        $type = DevisType::class;
		$model = $id ? $devisRepository->find($id) :  new Devis();
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

        return $this->render('coiffeur/devis/form.html.twig',[
            'form'=> $form->createView()
        ]); 

    }

    /**
	 * @Route("/devis/delete/{id}", name="coiffeur.devis.delete")
	 */
	public function delete( DevisRepository $devisRepository, EntityManagerInterface $entityManager, int $id):Response
	{
		$entity= $devisRepository->find($id);
		$entityManager->remove($entity);
		$entityManager->flush();
		$this->addFlash('notice_danger', 'Le produit a été supprimé');
		return $this->redirectToRoute('coiffeur.devis.index');
        
	}
    
}
