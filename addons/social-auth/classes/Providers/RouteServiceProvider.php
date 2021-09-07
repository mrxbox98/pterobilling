<?php

namespace App\SocialAuth\Providers;

use Illuminate\Routing\Router;
use Pterobilling\LaraAddomnipot\Support\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the addon.
     *
     * @param  \Illuminate\Routing\Router  $router  (injection)
     * @return void
     */
    public function map(Router $router)
    {
        parent::map($router);
    }

    /**
     * Get addon.
     *
     * @return \Pterobilling\LaraAddomnipot\Addon
     */
    protected function addon()
    {
        return addon();
    }
}
