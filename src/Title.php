<?php

namespace Titles;

class Title
{
    protected $parent = null;
    protected $titles = [];

    public function parent($name)
    {
        $params       = array_slice(func_get_args(), 1);
        $this->parent = [$name => $params];
    }

    /**
     * @param $name string
     */
    public function push($name)
    {
        $this->titles[] = $name;
    }

    /**
     * @return string|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return array
     */
    public function getTitles()
    {
        return $this->titles;
    }
}