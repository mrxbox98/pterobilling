<?php

use Pterobilling\LaraExtension\Specs\Factory as SpecFactory;

if (!function_exists('spec')) {
  /**
   * Get spec.
   *
   * @param string $path
   *
   * @return \Pterobilling\LaraExtension\Specs\Factory|Pterobilling\LaraExtension\Specs\InputSpec
   */
  function spec($path = null)
  {
    $factory = app(SpecFactory::class);

    if (func_num_args() == 0) {
      return $factory;
    }

    return $factory->make($path);
  }
}
