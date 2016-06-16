<?php

use AbelHalo\Titles\Repository\Title;

class TitleTest extends TestCase
{
    /**
     * @var Title
     */
    protected $title;

    public function setUp()
    {
        parent::setUp();

        $this->title = new Title();
    }

    public function testParent()
    {
        $this->title->parent('abel');

        $this->assertAttributeEquals(
            ['abel' => []],
            'parent',
            $this->title
        );

        $this->title->parent('abel', 'halo', 'Master Chief', 117);

        $this->assertAttributeEquals(
            ['abel' => ['halo', 'Master Chief', 117]],
            'parent',
            $this->title
        );
    }

    public function testPush()
    {
        $this->title->push('abel');
        $this->title->push('halo');

        $this->assertAttributeEquals(
            ['abel', 'halo'],
            'titles',
            $this->title
        );
    }
}
