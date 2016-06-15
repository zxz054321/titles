<?php

use Titles\Generator;
use Titles\Title;

class GeneratorTest extends TestCase
{
    public function testPush()
    {
        $this->assertEquals(
            ['root'],
            $this->generator()->generate('base')
        );

        $this->assertEquals(
            ['home', 'root'],
            $this->generator()->generate('home')
        );

        $this->assertEquals(
            ['post', 'cat', 'root'],
            $this->generator()->generate('post', ['cat', 'post'])
        );
    }

    protected function generator()
    {
        $callbacks['base'] = function (Title $title) {
            $title->push('root');
        };

        $callbacks['home'] = function (Title $title) {
            $title->parent('base');
            $title->push('home');
        };

        $callbacks['post'] = function (Title $title, $cat, $post) {
            $title->parent('base');
            $title->push($cat);
            $title->push($post);
        };

        $generator = new Generator($callbacks);

        return $generator;
    }
}
