<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    /**
     * @route("/list", name="property_list", methods={"GET"})
     */
    public function list(PropertyRepository $pr)
    {
        $properties = $pr->findAll();

        return $this->render('property/list.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/{id}", name="property_show",requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Property $property)
    {
        return $this->render('property/single.html.twig', [
            'property' => $property,
        ]);
    }
}
