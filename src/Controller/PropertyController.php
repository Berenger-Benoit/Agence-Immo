<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class PropertyController extends AbstractController
{
    /*
     * @route("/list", name="property_list")
     */
    public function list()
    {
        return $this->render('property/list.html.twig');
    }

    /**
     * @Route("/{id}", name="property_show",requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Property $property)
    {

        return $this->render('property/single.html.twig', [
            'property' => $property
        ]);
    }
}
