<?php

namespace LNCHUK\LaravelExtendedResource\Tests;

use LNCHUK\LaravelExtendedResource\Helpers\ExtendedResource;
use LNCHUK\LaravelExtendedResource\LaravelExtendedResourceServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function getPackageProviders($app)
    {
        return [
            LaravelExtendedResourceServiceProvider::class
        ];
    }

    public function getEnvironmentSetup($app)
    {
        ExtendedResource::init();
    }
}
