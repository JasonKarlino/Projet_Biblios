<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\AuteurFactory;
use App\Factory\EditeurFactory;
use App\Factory\LivreFactory;
use App\Factory\UserFactory;
use App\Factory\CommentaireFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AuteurFactory::createMany(15);
        EditeurFactory::createMany(10);
        LivreFactory::createMany(25);
        UserFactory::createMany(2);
        CommentaireFactory::createMany(10);
    }
}
