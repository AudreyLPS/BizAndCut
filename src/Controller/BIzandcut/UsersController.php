<?php

namespace App\Controller\Bizandcut;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/bizandcut")
 */
class UsersController extends AbstractController
{
    /**
	 * @Route("/listeusers/", name="bizandcut.users.index")
     */
	public function index(UserRepository $userRepository):Response
	{
        $results= $userRepository->findAll();
        return $this->render('bizandcut/users/index.html.twig', [
          'results' => $results,
        ]);
    }
}






