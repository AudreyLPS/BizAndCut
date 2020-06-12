<?php

namespace App\Controller\Bizandcut;

use App\Entity\Satisfaction;

use App\Form\SatisfactionType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/")
 */

class SatisfactionController extends AbstractController
{
	/**
    * @Route("/satisfaction/{devis_id}", name="satisfaction.form")
    */
    public function formSatisfaction(Request $request, EntityManagerInterface $entityManager, DevisRepository $devisRepository,int $devis_id ):Response {

        $type = SatisfactionType::class;
        $model = new Satisfaction();
        
		$form = $this->createForm($type, $model, ["label"=>$devis_id]);
		$form->handleRequest($request);
		
		$devis = $devisRepository->find($devis_id);

        // Si le formulaire est validé
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($model);
            $entityManager->flush();
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }

        return $this->render('rdv/creneaux/form.html.twig',[
			'form'=> $form->createView(),
			'devis' => $devis,
        ]); 
    }
    
}







