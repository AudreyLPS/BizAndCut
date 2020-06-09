<?php

namespace App\Controller\Bizandcut;

//use App\Data\SearchData;
use App\src\SearchData;
use App\Form\SearchType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/bizandcut")
 */
class UsersController extends AbstractController
{
   private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
	  * @Route("/listeusers/", name="bizandcut.users.index")
    */
	public function index(UserRepository $userRepository, Request $request):Response
	{
        $data = new SearchData();
        $form = $this->createForm(SearchType::class, $data);
        $form->handleRequest($request);
        $results=$userRepository->findSearch($data);
        //dd ($data);
        return $this->render('bizandcut/users/index.html.twig', [
          'results' => $results,
          'form'=> $form->createView(), 
          'data'=> $data,
        ]);
  }

   /**
	 * @Route("/listeusers/active/{id}", name="bizandcut.users.active")
     */
	public function active(int $id, UserRepository $userRepository):Response
  {
        $entityManager = $this->getDoctrine()->getManager();
        $user=$userRepository->find($id);
        $user->setDeleted(0);
        
        $entityManager->flush();

        return $this->redirectToRoute('bizandcut.users.index');
    }

    /**
	 * @Route("/listeusers/desactive/{id}", name="bizandcut.users.desactive")
     */
	public function desactive(int $id, UserRepository $userRepository):Response
  {
        $entityManager = $this->getDoctrine()->getManager();
        $user=$userRepository->find($id);
        $user->setDeleted(1);
        
        $entityManager->flush();

        return $this->redirectToRoute('bizandcut.users.index');
  }

  /**
  * @Route("/notif/true", name="bizandcut.notif.true")
  */
public function notiftrue(UserRepository $userRepository):Response
{
      $entityManager = $this->getDoctrine()->getManager();
      $admin=$userRepository->find($this->security->getUser());
      $admin->setNotif(true);
      
      $entityManager->flush();

      return $this->redirectToRoute('bizandcut.users.index');
}

/**
* @Route("/notif/false", name="bizandcut.notif.false")
*/
public function notiffalse(UserRepository $userRepository):Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $admin=$userRepository->find($this->security->getUser());
    $admin->setNotif(false);
    
    $entityManager->flush();

    return $this->redirectToRoute('bizandcut.users.index');
}

}







