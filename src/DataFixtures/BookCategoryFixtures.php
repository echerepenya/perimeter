<?php

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new BookCategory();
        $category->setTitle('Data');
        $category->setSlug('data');
        $manager->persist($category);

        $category = new BookCategory();
        $category->setTitle('Android');
        $category->setSlug('android');
        $manager->persist($category);

        $category = new BookCategory();
        $category->setTitle('Networking');
        $category->setSlug('networking');
        $manager->persist($category);

        $manager->flush();
    }
}
