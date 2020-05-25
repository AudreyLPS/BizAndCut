<?php

namespace App\Controller\Entreprise;

use App\Entity\Evenements;
use App\Form\EvenementType;
use App\Repository\EvenementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/entreprise")
 */
class EvenementsController extends AbstractController
{
	/**
	 * @Route("/listevenements", name="entreprise.evenements.index")
	 */
	public function index(EvenementsRepository $evenementsRepository):Response
	{
		$results= $evenementsRepository->findAll();
		return $this->render('entreprise/evenements/index.html.twig', [
			'results' => $results,
		]);
    }
    
	/**
        * @Route("/addevenements", name="entreprise.evenements.form")
        * @Route("/addevenements/form/update/{id}", name="entreprise.evenements.form.update")
    */
    public function formEvenement(Request $request, EntityManagerInterface $entityManager, int $id = null, EvenementsRepository $evenementsRepository):Response {
         
        $type = EvenementType::class;
        $DevisArray= $evenementsRepository->findByDevis($id);
        $model="";
        foreach ($DevisArray as $key => $var) {
            $model = $var ;
            
        }
        if ($model ===""){
            $model=new Evenements();
        }
        //dd($model);
		$form = $this->createForm($type, $model);
		$form->handleRequest($request);
        
        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
           
            $id && $model==="" ? null : $entityManager->persist($model);
            $entityManager->flush();
            
			// message de confirmation
			$message = "L'evenement a été modifié/crée";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }

        return $this->render('entreprise/evenements/form.html.twig',[
            'form'=> $form->createView()
        ]); 

    }
}








