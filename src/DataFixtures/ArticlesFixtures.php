<?php

namespace App\DataFixtures;

use Faker;
use DateTimeImmutable;
use App\Entity\Articles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 10; $i++)
        {
            $articles = new Articles();
            $articles->setTitle($faker->word());
            $articles->setSubtitle($faker->sentence());
            $articles->setSlug($faker->slug());
            $articles->setContent($faker->paragraph());
            $articles->setWrittenBy($faker->name());
            $articles->setCreatedAt(new DateTimeImmutable);
            $articles->setUpdatedAt(new DateTimeImmutable);

            $this->addReference('article_' . $i, $articles);

            $manager->persist($articles);
        }

        $manager->flush();
    }
}