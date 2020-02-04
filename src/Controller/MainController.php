<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PropertyRepository $pr)
    {
        $properties = $pr->findAll();
        
        return $this->render('main/home.html.twig',[
            'properties' => $properties
        ]);
           
    }

}
