<?php

namespace App\DataFixtures;

use App\Entity\Student;
use App\Entity\User;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');
        // on créé 10 users
        for ($i = 0; $i < 10; $i++) {
            $user = new Student();
            $user->setName($faker->name);
            $user->setFirstName($faker->name);
            $user->setBirthday($faker->dateTime());
            $user->setPhone($faker->mobileNumber);
            $user->setNationality($faker->name);
            $user->setEmail($faker->email);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'password'
            ));
            $manager->persist($user);


        }
        $manager->flush();
    }
}
