<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_list")
     */
    public function list(PropertyRepository $pr)
    {
        $properties = $pr->findAll();

        return $this->render('admin/index.html.twig', [
        'properties' => $properties,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="admin_edit", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function edit(Property $property, Request $request)
    {
       $form = $this->createForm(PropertyType::class, $property);

        $form->handleRequest($request);

        return $this->render('admin/edit.html.twig', [
        'property' => $property,
        'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="admin_new")
     */
    public function new()
    {
        return $this->render('admin/edit.html.twig');
    }
}
