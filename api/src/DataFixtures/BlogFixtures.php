<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\AuthorFixtures;
use DateTime;

class BlogFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $fakeContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        \n
        Aliquam purus sit amet luctus venenatis lectus magna. In iaculis nunc sed augue lacus viverra vitae congue. 
        Nunc sed velit dignissim sodales ut. Fusce ut placerat orci nulla pellentesque dignissim enim sit amet. 
        Turpis egestas integer eget aliquet nibh praesent tristique. Pellentesque diam volutpat commodo sed egestas. 
        \n
        Varius quam quisque id diam vel quam. Magna eget est lorem ipsum. 
        Id velit ut tortor pretium viverra suspendisse potenti nullam ac. 
        Vel elit scelerisque mauris pellentesque pulvinar pellentesque. 
        Sit amet porttitor eget dolor morbi non arcu risus. 
        Amet cursus sit amet dictum sit amet justo donec enim. Pulvinar neque laoreet suspendisse interdum consectetur. 
        Tincidunt augue interdum velit euismod in pellentesque massa.";
        
        $fakePosts = array(
            [
                "title"=>"Post 1",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-1",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>0
            ],
            [
                "title"=>"Post 2",
                "content_preview"=>"Lorem ipsum dolor sit amet,",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-2",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>1
            ],
            [
                "title"=>"Post 3",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-3",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>2
            ],
            [
                "title"=>"Post 4",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-4",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>3
            ],
            [
                "title"=>"Post 5",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-5",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>0
            ],
            [
                "title"=>"Post 6",
                "content_preview"=>"Lorem ipsum dolor sit amet,",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-6",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>1
            ],
            [
                "title"=>"Post 7",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-7",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>2
            ],
            [
                "title"=>"Post 8",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-8",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>3
            ],
            [
                "title"=>"Post 9",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-9",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>0
            ],
            [
                "title"=>"Post 10",
                "content_preview"=>"Lorem ipsum dolor sit amet,",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-10",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>1
            ],
            [
                "title"=>"Post 11",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-11",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>2
            ],
            [
                "title"=>"Post 12",
                "content_preview"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit",
                "content"=>$fakeContent,
                "category"=>"news",
                "slug"=>"post-12",
                "cover_image_url"=>"https://source.unsplash.com/640x640/?rock-concert",
                "author_id"=>3
            ],
          
        );
        
        
        for($i=0; $i<sizeof($fakePosts); $i++){
            $post = new Post();
            $post->setTitle($fakePosts[$i]['title']);
            $post->setContentPreview($fakePosts[$i]['content_preview']);
            $post->setContent($fakePosts[$i]['content']);
            $post->setCategory($fakePosts[$i]['category']);
            $post->setSlug($fakePosts[$i]['slug']);
            $post->setCoverImageUrl($fakePosts[$i]['cover_image_url']);

            $authorForPost = $this->getReference('authors');
            $authorForPost->setId(intval($fakePosts[$i]['author_id']));

            $post->setAuthorId($authorForPost);
            $post->setCreatedAt(new DateTime);
            $manager->merge($post);
        }
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            AuthorFixtures::class,
        );
    }
}