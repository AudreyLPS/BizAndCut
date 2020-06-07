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

    
    /**
     * @Route("/prestationDeCoiffure", name="bizAndCutOtherPage.prestationDeCoiffure.index")
     */
    public function indexPrestationDeCoiffure(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('bizAndCutOtherPage/prestationDeCoiffure/index.html.twig',[
            'param' => $userAgent
        ]); 
    }

    /**
     * @Route("/commentCaMarche", name="bizAndCutOtherPage.commentCaMarche.index")
     */
    public function indexCommentCaMarche(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('bizAndCutOtherPage/commentCaMarche/index.html.twig',[
            'param' => $userAgent
        ]); 
    }

    /**
     * @Route("/detailsDeNosPrestation", name="bizAndCutOtherPage.detailsDeNosPrestation.index")
     */
    public function indexDetailsDeNosPrestation(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('bizAndCutOtherPage/detailsDeNosPrestation/index.html.twig',[
            'param' => $userAgent
        ]); 
    }


    

    /**
     * @Route("/bizandcut", name="bizandcut.homepage.index")
     */
    public function indexBC(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('bizandcut/homepage/index.html.twig',[
            'param' => $userAgent
        ]); 
    }

    /**
     * @Route("/coiffeur", name="coiffeur.homepage.index")
     */
    public function indexCoiffeurs(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('coiffeur/homepage/index.html.twig',[
            'param' => $userAgent
        ]); 
    }
    
    /**
     * @Route("/entreprise", name="entreprise.homepage.index")
     */
    public function indexEntreprise(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('entreprise/homepage/index.html.twig',[
            'param' => $userAgent
        ]); 
    }

    /**
     * @Route("/salarie", name="salarie.homepage.index")
     */
    public function indexSalarie(Request $request):Response {
                
        $userAgent=$request->server->get("HTTP_USER_AGENT");
        return $this->render('salarie/homepage/index.html.twig',[
            'param' => $userAgent
        ]); 
    }
}

