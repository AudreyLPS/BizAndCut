<?php

namespace App\Controller;


use App\Entity\Coiffeurs;
use App\Form\Insc_coifType;
use App\Controller\Insc_coifController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Insc_coifController extends AbstractController
{
    /**
     * @Route("/insc_coif", name="insc_coif.index")
     */

    public function index(Request $request, EntityManagerInterface $entityManager, int $id=null):Response
    {

        $type = Insc_coifType::class;
		$model = new Coiffeurs();
		$form = $this->createForm($type, $model);
        $form->handleRequest($request);
        
        
		if($form->isSubmitted() && $form->isValid()){
			$id ? null : $entityManager->persist($model);
			$entityManager->flush();

			
			$message = "Vous êtes enregistré en tant que coiffeur";
            $this->addFlash('notice', $message);
            
            return $this->redirectToRoute('homepage.index');

			
        }
        
        return $this->render('insc_coif/form.html.twig', [
			'form' => $form->createView()
		]);
    }
}
