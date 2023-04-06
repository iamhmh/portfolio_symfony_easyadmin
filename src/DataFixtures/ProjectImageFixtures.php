<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\ProjectImage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 5; $i++) {
            $img = rand(1, 17) . '.jpg';

            $ProjectImage = new ProjectImage();
            $ProjectImage->setAlt($faker->sentence(3));
            $ProjectImage->setImageName($img);
            $ProjectImage->setImageSize($i);
            $ProjectImage->setProjects($this->getReference('project_' . rand(0, 10)));

            $manager->persist($ProjectImage);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProjectsFixtures::class,
        ];
    }
}
