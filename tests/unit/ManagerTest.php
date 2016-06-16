<?php

use AbelHalo\Titles\Repository\Manager;
use AbelHalo\Titles\Repository\Title;

class ManagerTest extends TestCase
{
    public function testRender()
    {
        $manager = new Manager();

        $manager->register('base', function (Title $title) {
            $title->push('root');
        });

        $manager->register('home', function (Title $title) {
            $title->parent('base');
            $title->push('home');
        });

        $manager->register('post', function (Title $title, $cat, $post) {
            $title->parent('base');
            $title->push($cat);
            $title->push($post);
        });

        $this->assertEquals(
            'root',
            $manager->render('base')
        );

        $this->assertEquals(
            'home - root',
            $manager->render('home')
        );

        $this->assertEquals(
            'post | cat - root',
            $manager->render('post', 'cat', 'post')
        );
    }
}
