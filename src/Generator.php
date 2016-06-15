<?php

namespace Titles;

class Generator
{
    protected $callbacks = [];
    protected $list = [];

    public function __construct($callbacks)
    {
        $this->callbacks = $callbacks;
    }

    public function generate($name, $params = [])
    {
        $registration = $this->callbacks[ $name ];
        $title        = new Title();

        array_unshift($params, $title);
        call_user_func_array($registration, $params);

        $titles     = array_reverse($title->getTitles());
        $this->list = array_merge($this->list, $titles);

        if ($parent = $title->getParent()) {
            return $this->generate(
                key($parent),
                current($parent)
            );
        }

        return $this->list;
    }
}