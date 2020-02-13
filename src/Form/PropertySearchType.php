<?php

namespace App\Form;

use App\Entity\Tag;
use App\Entity\PropertySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class, [
                'required' =>false,
                'label' => 'Surface Minimum',
                'attr' =>
                ['placeholder' => 'Surface min en m²']
            ])
            ->add('maxPrice', IntegerType::class, [
                'required' =>false,
                'label' => 'Prix maximum',
                'attr' =>
                ['placeholder' => 'Budget max €']
            ])
            ->add('tags', EntityType::class, [
                'required' => false,
                'label' => 'Critères',
                'class'=> Tag::class,
                'multiple'=> true

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}
