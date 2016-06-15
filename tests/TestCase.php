<?php

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders()
    {
        return [
            \Titles\ServiceProvider::class,
        ];
    }

    protected function getPackageAliases()
    {
        return [
            'Titles' => \Titles\Facade::class,
        ];
    }
}
