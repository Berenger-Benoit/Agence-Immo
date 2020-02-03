<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('main/home.html.twig');
    }

    /*
     * @route("/properties", name="properties_list")
     */
    public function list()
    {
        return $this->render('main/list.html.twig');
    }
}