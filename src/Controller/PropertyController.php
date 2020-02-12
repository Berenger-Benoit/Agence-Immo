<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @route("/list", name="property_list", methods={"GET"})
     */
    public function list(PropertyRepository $pr, PaginatorInterface $paginator, Request $request)
    {
        $properties = $paginator->paginate(
            $pr->findAll(),
            $request->query->getInt('page', 1),
            12);

        return $this->render('property/list.html.twig', [
            'properties' => $properties,
        ]);
    }

    /**
     * @Route("/{id}", name="property_show",requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Property $property)
    {
        if (false == $property->getSold()) {
            $status = 'A vendre';
        }
        if (true == $property->getSold()) {
            $status = 'Vendu';
        }

        return $this->render('property/single.html.twig', [
            'property' => $property,
            'status' => $status,
        ]);
    }
}
