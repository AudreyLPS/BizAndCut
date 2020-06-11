<?php

namespace App\Controller\Bizandcut;

use App\Repository\UserRepository;
use App\Repository\DevisRepository;
use App\Repository\MailsRepository;
use App\Repository\CoiffeursRepository;
use App\Repository\EntrepriseRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/bizandcut")
 */
class TdbController extends AbstractController
{
	/**
	 * @Route("/", name="bizandcut.index")
	 */
    public function index(  UserRepository $userRepository, 
                            DevisRepository $devisRepository,
                            CoiffeursRepository $coiffeurRepository,
                            EntrepriseRepository $entrepriseRepository, 
                            MailsRepository $mailsRepository
                            ):Response
	{
        $users       = $userRepository       ->findAll();
        $coiffeurs   = $coiffeurRepository   ->findAll(); 
        $entreprises = $entrepriseRepository ->findAll();  
        $devis       = $devisRepository      ->findAll(); 
        $mails       = $mailsRepository      ->findAll();  

		return $this->render('bizandcut/tableauDeBord/index.html.twig', [
            'users'          => $users,
            'coiffeurs'      => $coiffeurs,
            'entreprises'    => $entreprises,
            'devis'          => $devis, 
            'mails'          => $mails, 
            
		]); 
    } 
    
  /**
	 * @Route("/mail", name="bizandcut.mail")
	 */
  public function mail( MailsRepository $mailsRepository):Response
    {
      $mails = $mail->findAll();

      return $this->render('bizandcut/tableauDeBord/mails.html.twig', [
      'mails'        => $mails
      ]); 
    } 
}