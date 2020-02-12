<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; ++$i) {
            $property = new Property();
            $property->setTitle($faker->words(4, true))
                    ->setDescription($faker->sentences(3, true))
                    ->setSurface($faker->numberBetween($min = 15, $max = 500))
                    ->setRooms($faker->numberBetween($min = 1, $max = 5))
                    ->setBedrooms($faker->numberBetween($min = 1, $max = 3))
                    ->setFloor($faker->numberBetween($min = 1, $max = 5))
                    ->setPrice($faker->numberBetween($min = 100000, $max = 700000))
                    ->setHeat($faker->numberBetween(1,count(Property::HEAT,- 1)))
                    ->setCity($faker->city())
                    ->setAddress($faker->address())
                    ->setPostalCode($faker->numberBetween($min = 01000, $max = 95000))
                    ->setSold(false);
            $manager->persist($property);
        }

        
        
        $manager->flush();
    }
}
