<?php

namespace App\DataFixtures;

use App\Entity\UserSecurity;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserSecurityFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) 
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager): void
    {
        $user = new UserSecurity();
        $user->setEmail('johndoe@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->encoder->hashPassword( $user, '123456789' ) );
        $manager->persist($user);

        $manager->flush();
    }
}
