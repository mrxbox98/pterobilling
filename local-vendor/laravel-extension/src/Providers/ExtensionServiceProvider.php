<?php

namespace Pterobilling\LaraExtension\Providers;

use Illuminate\Support\Facades\Blade;
use Pterobilling\LaraAddomnipot\Environment as AddonEnvironment;
use Pterobilling\LaraAddomnipot\Registrar as AddonRegistrar;
use Pterobilling\LaraAddomnipot\ClassLoader as AddonClassLoader;
use Pterobilling\LaraAddomnipot\Generator as AddonGenerator;
use Pterobilling\LaraAddomnipot\AliasResolver;
use Pterobilling\LaraAddomnipot\Repository;
use Pterobilling\LaraAddomnipot\Events\AddonWorldCreated;
use Pterobilling\LaraAddomnipot\Events\AddonRegistered;
use Pterobilling\LaraAddomnipot\Events\AddonBooted;
use Pterobilling\LaraExtension\Templates\BladeExtension;
use Pterobilling\LaraVersionia\Migrator;

class ExtensionServiceProvider extends \Illuminate\Support\ServiceProvider
{
  /**
   * Addon environment.
   *
   * @var \Pterobilling\LaraAddomnipot\Environment
   */
  protected $addonEnvironment;

  /**
   * @var array
   */
  protected $addons;

  /**
   * Register the service provider.
   */
  public function register()
  {
    $app = $this->app;

    // register spec path for app
    $app['path.specs'] = $app->basePath() . '/resources/specs';

    // register spec repository
    $app->singleton('specs', function ($app) {
      $loader = new Repository\FileLoader($app['files'], $app['path.specs']);

      return new Repository\NamespacedRepository($loader);
    });

    // register addon environment
    $app->instance('addon', $this->addonEnvironment = new AddonEnvironment($app));
    $app->alias('addon', AddonEnvironment::class);

    // register addon generator
    $app->singleton('addon.generator', function ($app) {
      return new AddonGenerator();
    });
    $app->alias('addon.generator', AddonGenerator::class);

    // register database migrator
    $app->singleton('database.migrator', function ($app) {
      return new Migrator($app['db'], $app['config']);
    });
    $app->alias('database.migrator', Migrator::class);

    event(new AddonWorldCreated($this->addonEnvironment));

    $this->registerClassResolvers();

    (new AddonRegistrar)->register($app, $this->addonEnvironment->addons());

    event(new AddonRegistered($this->addonEnvironment));
  }

  /**
   */
  protected function registerClassResolvers()
  {
    $addons = $this->addonEnvironment->addons();

    AddonClassLoader::register($this->addonEnvironment, $addons);

    AliasResolver::register($this->app['path'], $addons, $this->app['config']->get('app.aliases', []));
  }

  /**
   * Bootstrap the application events.
   */
  public function boot()
  {
    $app = $this->app;

    //
    $this->registerBladeExtensions();

    // boot all addons
    (new AddonRegistrar)->boot($app, $this->addonEnvironment->addons());

    event(new AddonBooted($this->addonEnvironment));
  }

  /**
   * register blade extensions.
   */
  protected function registerBladeExtensions()
  {
    Blade::extend(BladeExtension::comment());

    Blade::extend(BladeExtension::script());
  }
}
