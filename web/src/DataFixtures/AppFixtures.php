<?php


namespace App\DataFixtures;

use App\Entity\Blehs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager) {

        for ($i=1; $i<=5; $i++) {
            $bleh = new Blehs();
            $bleh -> setName('name - ' .$i);
            $manager -> persist($bleh);


        }
        $manager -> flush();

    }


}