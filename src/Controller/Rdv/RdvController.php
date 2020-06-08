<?php

namespace App\Controller\Rdv;

use App\Entity\Rdv;
use App\Form\CreneauxType;
use App\Repository\RdvRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/rdv")
 */
 
class RdvController extends AbstractController 
{
    /**
	 * @Route("/", name="rdv.creneaux.index")
	 */
	public function index( RdvRepository $rdvRepository):Response
	{
        $results= $rdvRepository->findAll();
		return $this->render('rdv/creneaux/index.html.twig', [
			'results' => $results,
		]);
    }

    /**
    * @Route("/form", name="rdv.creneaux.form")
    */
    public function formEvenement(Request $request, EntityManagerInterface $entityManager, int $id = null, RdvRepository $rdvRepository):Response {

        $type = CreneauxType::class;
        $model = $id ? $rdvRepository->find($id) :  new Rdv();
        
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $id ? null : $entityManager->persist($model);
            $entityManager->flush();
            
			// message de confirmation
			$message = "Votre rendez-vous a été enregistré. ";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }

        return $this->render('rdv/creneaux/form.html.twig',[
            'form'=> $form->createView()
        ]); 

    }

    /*
	 * @Route("/salarie/creneaux/{id}", name="salarie.creneaux.delete")
	 */

     /*
	public function delete(  RdvRepository $rdvRepository, EntityManagerInterface $entityManager, int $id):Response
	{
		$entity= $rdvRepository->find($id);
		$entityManager->remove($entity);
		$entityManager->flush();
		$this->addFlash('notice_danger', 'Votre creneau a été annulé');
		return $this->redirectToRoute('entreprise.devis.index');
        
    }
    */
    
}
