<?php

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Titles\ServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Titles' => \Titles\Facade::class,
        ];
    }
}
