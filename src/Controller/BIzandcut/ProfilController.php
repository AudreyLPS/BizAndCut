<?php

namespace App\Controller\Bizandcut;

use App\Entity\Profil;

use App\Entity\Coiffeurs;
use App\Repository\ProfilRepository;
use App\Repository\CoiffeursRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/bizandcut")
 */

class ProfilController extends AbstractController
{
	/**
	 * @Route("/profil/{coiffeur}", name="bizandcut.profil.index")
	 */
	public function index(CoiffeursRepository $CoiffeursRepository, ProfilRepository $profilRepository, int $coiffeur):Response
	{
        $user= $CoiffeursRepository->find($coiffeur);
        $profils= $profilRepository->findBy(array('user'=>$coiffeur));
        $profil=null;
        foreach ($profils as $i => $value) {
            $profil= $profilRepository->find($value->getId());
        }
        
		return $this->render('bizandcut/coiffeur/index.html.twig', [
			'user' => $user,
			'profil' => $profil,
		]); 
    } 
    
}







