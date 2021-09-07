<?php

namespace App\SocialAuth\Providers;

use Pterobilling\LaraVersionia\Support\DatabaseServiceProvider as ServiceProvider;
use App\SocialAuth\Migrations;
use App\SocialAuth\Seeds;

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
