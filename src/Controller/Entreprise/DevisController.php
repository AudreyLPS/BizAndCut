<?php

namespace App\Controller\Entreprise;

use App\Entity\Devis;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/entreprise")
 */

class DevisController extends AbstractController 
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
	 * @Route("/listdevis", name="entreprise.devis.index")
	 */
	public function index(DevisRepository $devisRepository):Response
	{
        $results= $devisRepository->findBy(array('entreprise'=>$this->security->getUser()));
		return $this->render('entreprise/devis/index.html.twig', [
			'results' => $results,
		]);
    }
    
    /**
        * @Route("/devis/form", name="entreprise.devis.form")
        * @Route("/devis/form/update/{id}", name="entreprise.devis.form.update")
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

        return $this->render('entreprise/devis/form.html.twig',[
            'form'=> $form->createView()
        ]); 

    }

    /**
	 * @Route("/devis/delete/{id}", name="entreprise.devis.delete")
	 */
	public function delete( DevisRepository $devisRepository, EntityManagerInterface $entityManager, int $id):Response
	{
		$entity= $devisRepository->find($id);
		$entityManager->remove($entity);
		$entityManager->flush();
		$this->addFlash('notice_danger', 'Le produit a été supprimé');
		return $this->redirectToRoute('entreprise.devis.index');
        
	}
    
}
