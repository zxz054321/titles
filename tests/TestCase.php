<?php

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \AbelHalo\Titles\ServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Titles' => \AbelHalo\Titles\Facade::class,
        ];
    }
}
