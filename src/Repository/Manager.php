<?php

namespace AbelHalo\Titles\Repository;

use Closure;

class Manager
{
    protected $callbacks = [];

    public function register($name, Closure $callback)
    {
        $this->callbacks[ $name ] = $callback;
    }

    public function render($name)
    {
        $generator = new Generator($this->callbacks);
        $params    = array_slice(func_get_args(), 1);
        $titles    = $generator->generate($name, $params);
        $head      = array_pop($titles);

        if ($titles) {
            $body = implode($titles, ' | ');

            return $body . ' - ' . $head;
        }

        return $head;
    }
}