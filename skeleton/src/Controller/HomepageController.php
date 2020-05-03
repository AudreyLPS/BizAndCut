<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController 
{   
    /**
     * @Route("/test", name="homepage.index", methods={"GET","PUT"})
     */
    public function index(Request $request, ProductRepository $productRepository):Response {
        return $this->render('homepage/index.html.twig',[
        ]); 
    }
}

