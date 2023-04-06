<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Projects;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjectsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 10; $i++) {
            $project = new Projects();
            $project->setProjectTitle($faker->sentence(3));
            $project->setProjectSubTitle($faker->sentence(10));
            $project->setProjectContent($faker->sentence(15));

            $this->addReference('project_' . $i, $project);

            $manager->persist($project);
        }

        $manager->flush();
    }
}
