<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setFirstName('Alison')
            ->setLastName('Barret')
            ->setEmail('barretalison@gmail.com')
            ->setHash($this->encoder->encodePassword($adminUser, 'password'));

        $manager->persist($adminUser);

        $manager->flush();
    }
}
