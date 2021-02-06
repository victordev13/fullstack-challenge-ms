<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Author;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fakeAuthorsFullName = ["Victor Carvalho","João Pereira","Antônio Santos","Kely Silva","Fernanda Santos"];
        $fakeAuthorsUserName = ["victorcarvalho","joaopereira","antoniosantos","kelysilva","fernandasantos"];
        
        for($i=0; $i<sizeof($fakeAuthorsFullName); $i++){
            $author = new Author();
            $author->setFullname($fakeAuthorsFullName[$i]);
            $author->setUsername($fakeAuthorsUserName[$i]);
            $manager->persist($author);
        }
        
        $this->setReference('authors', $author);

        $manager->flush();
    }
}
