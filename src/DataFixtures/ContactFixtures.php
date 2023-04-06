<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        
        $contact->setAddress('Rue de la Paix, 75000 Paris');
        $contact->setPhone('01 23 45 67 89');
        $contact->setEmail('johndoe@gmail.com');
        $contact->setTwitter('https://twitter.com/johndoe');

        $manager->persist($contact);

        $manager->flush();
    }
}
