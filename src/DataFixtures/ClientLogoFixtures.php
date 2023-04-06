<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\ClientLogo;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClientLogoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 5; $i++) {
            $img = rand(1, 12) . '.svg';

            $ClientLogo = new ClientLogo();
            $ClientLogo->setAlt($faker->sentence(3));
            $ClientLogo->setImageName($img);
            $ClientLogo->setImageSize($i);

            $manager->persist($ClientLogo);
        }
        
        $manager->flush();
    }
}
