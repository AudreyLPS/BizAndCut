<?php

//namespace
// App provient de composer.json -- autoload
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController 
{     
    /**
     * @Route("/", name="homepage.index")
     */
    public function index(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('homepage/index.html.twig',[
            'param' => $userAgent
        ]); 
    }
}

