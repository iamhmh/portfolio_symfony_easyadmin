<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Services;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServicesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 3; $i++)
        {
            $services = new Services();
            $services->setPlanType($faker->word());
            $services->setPrice($faker->randomFloat(2, 0, 100));
            $services->setPrincipalFeatures($faker->sentence());
            $services->setOtherFeatures($faker->sentence());

            $this->addReference('services_' . $i, $services);

            $manager->persist($services);
        }

        $manager->flush();
    }
}
