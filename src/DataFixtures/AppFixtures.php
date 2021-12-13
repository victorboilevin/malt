<?php

namespace App\DataFixtures;

use App\Entity\Mission;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 30; $i++) {
            $mission = new Mission;

            $date = new DateTime("now");
            $mission->setTitle("mission " . $i);
            $mission->setDescription("une description " . $i);
            $mission->setStartDate($date);
            $mission->setDuration(60);
            $mission->setPlace("strasbourg");

            $manager->persist($mission);
        }
        $manager->flush();
    }
}
