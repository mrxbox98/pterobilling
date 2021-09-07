<?php

namespace {$namespace}\Providers;

use Pterobilling\LaraVersionia\Support\DatabaseServiceProvider as ServiceProvider;
use {$namespace}\Migrations;
use {$namespace}\Seeds;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap database services.
     *
     * @return void
     */
    public function boot()
    {
        $this->migrations('auth', [
            '1.0' => Migrations\Auth_1_0::class,
        ]);
    }
}
