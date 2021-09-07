<?php

namespace App\SocialAuth;

return [
    'version' => 5,
    'namespace' => __NAMESPACE__,
    'directories' => [
        'classes',
    ],
    'files' => [
        'helpers.php',
    ],
    'paths' => [
        'config' => 'config',
        'assets' => 'assets',
        'lang' => 'lang',
        'views' => 'views',
        'tests' => 'tests',
    ],
    'providers' => [
        Providers\AddonServiceProvider::class,
        Providers\DatabaseServiceProvider::class,
        Providers\RouteServiceProvider::class,
    ],
    'commands' => [
    ],
    'middleware' => [
    ],
    'routes' => [
        'domain' => env('APP_ADDON_DOMAIN'),
        'prefix' => env('APP_ADDON_PATH', '/'),
        'namespace' => __NAMESPACE__.'\Controllers',
        'middleware' => [
            'web',
        ],
        'files' => [
            'routes/web.php',
        ],
        'landing' => '/',
        'home' => '/home',
        'login' => '/login',
    ],
    'aliases' => [
    ],
    'includes_global_aliases' => true,
    'http' => [
        'middlewares' => [
        ],
        'route_middlewares' => [
            'auth' => Middleware\Authenticate::class,
            'auth.basic' => Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'guest' => Middleware\RedirectIfAuthenticated::class,
        ],
    ],
];
