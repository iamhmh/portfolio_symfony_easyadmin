<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\BlogImage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BlogImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 5; $i++) {
            $img = rand(1, 12) . '.jpg';

            $BlogImage = new BlogImage();
            $BlogImage->setAlt($faker->sentence(3));
            $BlogImage->setImageName($img);
            $BlogImage->setImageSize($i);
            $BlogImage->setArticles($this->getReference('article_' . rand(0, 10)));

            $manager->persist($BlogImage);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ArticlesFixtures::class,
        ];
    }
}
