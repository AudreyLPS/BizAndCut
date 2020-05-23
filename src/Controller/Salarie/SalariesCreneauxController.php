<?php

namespace App\Controller\Salarie;

use App\Entity\SalariesCreneaux;
use App\Form\CreneauxType;
use App\Repository\SalariesCreneauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/salarie")
 */

class SalariesCreneauxController extends AbstractController 
{
    /**
	 * @Route("/listcreneaux", name="entreprise.devis.index")
	 */
	public function index(SalariesCreneauxRepository $salariesCreneauxRepository):Response
	{
        $results= $salariesCreneauxRepository->findAll();
		return $this->render('entreprise/devis/index.html.twig', [
			'results' => $results,
		]);
    }
    

    /**
        * @Route("/creneaux/form", name="entreprise.devis.form")
        * @Route("/creneaux/form/update/{id}", name="entreprise.devis.form.update")
    */
    
    public function formEvenement(Request $request, EntityManagerInterface $entityManager, int $id = null, SalariesCreneauxRepository $salariesCreneauxRepository):Response {

        $type = CreneauxType::class;
		$model = $id ? $salariesCreneauxRepository->find($id) : new SalariesCreneaux();
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $id ? null : $entityManager->persist($model);
            $entityManager->flush();
            
			// message de confirmation
			$message = "Votre creneau a été validé";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }

        return $this->render('entreprise/devis/form.html.twig',[
            'form'=> $form->createView()
        ]); 

    }

    /**
	 * @Route("/devis/delete/{id}", name="entreprise.devis.delete")
	 */
	public function delete( SalariesCreneauxRepository $salariesCreneauxRepository, EntityManagerInterface $entityManager, int $id):Response
	{
		$entity= $salariesCreneauxRepository->find($id);
		$entityManager->remove($entity);
		$entityManager->flush();
		$this->addFlash('notice_danger', 'Votre creneau a été annulé');
		return $this->redirectToRoute('entreprise.devis.index');
        
	}
    
}
