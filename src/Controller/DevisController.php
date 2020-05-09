<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevisController extends AbstractController 
{

    /**
        * @Route("/adddevis", name="devis.form")
    */
    
    public function index(Request $request, EntityManagerInterface $entityManager, int $id = null):Response {

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

        return $this->render('devis/index.html.twig',[
            'form'=> $form->createView()
        ]); 

    }
}
