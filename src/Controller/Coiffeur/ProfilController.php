<?php

namespace App\Controller\Coiffeur;

use App\Entity\Profil;
use App\Form\ProfilType;
use App\Entity\Coiffeurs;
use App\Entity\DevisStatut;
use App\Entity\Propositions;
use App\Form\PropositionType;
use App\Repository\UserRepository;
use App\Repository\DevisRepository;
use App\Repository\ProfilRepository;
use App\Repository\CoiffeursRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use App\Controller\Coiffeur\ProfilController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/coiffeur")
 */

class ProfilController extends AbstractController
{
    
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

	/**
	 * @Route("/profil/{coiffeur}", name="coiffeur.profil.index")
	 */
	public function index(CoiffeursRepository $CoiffeursRepository,ProfilRepository $profilRepository, int $coiffeur ):Response
	{

        $user= $CoiffeursRepository->find($coiffeur);
        $profils= $profilRepository->findBy(array('user'=>$coiffeur));
        $profil=null;
        foreach ($profils as $i => $value) {
            $profil= $profilRepository->find($value->getId());
        }
        
		return $this->render('coiffeur/profil/index.html.twig', [
			'user' => $user,
			'profil' => $profil,
		]); 
    }
    
    
    
    /**
	 * @Route("/profil/form", name="coiffeur.profil.form")
     * @Route("/profil/form/update/{id}", name="coiffeur.profil.form.update")
	 */

    public function form(int $id = null, ProfilRepository $profilRepository, Request $request, EntityManagerInterface $entityManager):Response
	{   
        $type = ProfilType::class;
        $model = $id ? $profilRepository->find($id) : new Profil();
        
        $form = $this->createForm($type, $model);
        $form->handleRequest($request);
        
        
        if($form->isSubmitted() && $form->isValid()){
            $id ? null : $entityManager->persist($model);
            $entityManager->flush();
             
			// message de confirmation
			$message = "Le devis a été envoyé";
            $this->addFlash('notice', $message);
            
            //redirection
            return $this->redirectToRoute('homepage.index'); // on redirige vers le nom d'une route
        }
        
        return $this->render('coiffeur/profil/form.html.twig',[
            'form' => $form->createView(),
            
        ]);
            // 'form'=> $form->createView()
      
    } 
}







