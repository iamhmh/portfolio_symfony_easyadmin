<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Team;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 10; $i++)
        {
            $team = new Team();
            $team->setFirstName($faker->firstName());
            $team->setLastName($faker->lastName());
            $team->setJob($faker->jobTitle());

            $this->addReference('team_' . $i, $team);

            $manager->persist($team);
        }

        $manager->flush();
    }
}
