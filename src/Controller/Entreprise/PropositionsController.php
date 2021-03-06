<?php

namespace App\Controller\Entreprise;

use App\Entity\Planning;
use App\Entity\DevisStatut;
use App\Entity\Propositions;
use App\Repository\DevisRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DevisStatutRepository;
use App\Repository\PropositionsRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/entreprise")
 */
class PropositionsController extends AbstractController
{
  private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
	 * @Route("/listepropositions/{idDevis}", name="entreprise.propositions.index")
     */
	public function index(int $idDevis, PropositionsRepository $propositionsRepository):Response
	{
      $results=$propositionsRepository->findBy(array('devis'=>$idDevis, 'validationBC'=>1 ));
		  return $this->render('entreprise/propositions/index.html.twig', [
			'results' => $results
		]);
    }

    /**
	 * @Route("/listepropositions/accompte/{id}/{idDevis}", name="entreprise.propositions.accompte")
     */
    public function accompte(int $id,int $idDevis ,DevisStatutRepository $dsRepository, DevisRepository $devisRepository,PropositionsRepository $propositionsRepository):Response
    {  
      $entityManager = $this->getDoctrine()->getManager();
      $proposition=$propositionsRepository->find($id);

      $devis=$devisRepository->find($idDevis);
      return $this->render('entreprise/devis/accepte.html.twig', [
        'devis' => $devis,
        'proposition'=> $proposition
      ]);
      }

    /**
	   * @Route("/listepropositions/set/{id}/{idDevis}", name="entreprise.propositions.accepte")
     */
	public function accepte(MailerInterface $mailer, int $id,int $idDevis ,DevisStatutRepository $dsRepository, DevisRepository $devisRepository,PropositionsRepository $propositionsRepository):Response
  {
        $entityManager = $this->getDoctrine()->getManager();
        $proposition=$propositionsRepository->find($id);
        $proposition->setValidationEntreprise(1);

        $devisStatus = $dsRepository->find(2);
        $devis=$devisRepository->find($idDevis);
        $devis->setDevisStatut($devisStatus);

        $planning=new Planning();
        $planning->setDevis($devis);
        $entityManager->persist($planning);
        $entityManager->flush();
        
        //envoi d'email
          $to = $this->security->getUser()->getEmail(); 
          $message = (new TemplatedEmail())
                ->from('audreybizandcut@gmail.com')
                ->to($to)
                ->subject('Contact')
                ->textTemplate('emailing/invitationMail.txt.twig')//cibler un template twig
                ->context([ // permet d'envoyer des information a la vue 
                    'idPlanning' => $planning->getId(),
                    'libelle'=>$devis->getLibelle(), 
                    'montant'=>$proposition->getMontant()
                    
                ]);  
                $mailer->send($message);

		$results= $devisRepository->findAll();
		return $this->render('entreprise/devis/index.html.twig', [
			'results' => $results,
		]);
    }
}







