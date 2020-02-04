<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPropertyController extends AbstractController
{
   
    
    /**
     * @Route("/admin", name="admin_list")
     */
    public function list(PropertyRepository $pr)
    {
        $properties = $pr->findAll();

        return $this->render('admin/index.html.twig',[
        'properties' => $properties
        ]);
    }

    /**
     * @Route("/edit/{id}", name="admin_edit")
     */
    public function edit(Property $property)
    {
        

        return $this->render('admin/edit.html.twig',[
        'property' => $property
        ]);
    }
}
