<?php

namespace Pterobilling\LaraExtension\Specs;

class Factory
{
  /**
   * rule string or array.
   *
   * @param string $path
   *
   * @return \Pterobilling\LaraExtension\Specs\InputSpec
   */
  public function make($path)
  {
    return new InputSpec(app('specs'), app('translator'), $path);
  }

  /**
   * Get the specified spec value.
   *
   * @param string $key
   * @param mixed  $default
   *
   * @return \Pterobilling\LaraExtension\Repository\NamespacedRepository|string
   */
  function get($key, $default = null)
  {
    return app('specs')->get($key, $default);
  }

  /**
   * @param string $namespace
   *
   * @return \Pterobilling\LaraExtension\Specs\Translator
   */
  public function translator($namespace)
  {
    return new Translator(app('translator'), $namespace);
  }

  /**
   * @param string | \Pterobilling\LaraExtension\Specs\InputSpec $pathOrSpec
   * @param array                                           $in
   *
   * @return \Pterobilling\LaraExtension\Specs\InputModel
   */
  public function inputModel($pathOrSpec, array $in = null)
  {
    if (is_string($pathOrSpec)) {
      $spec = $this->make($pathOrSpec);
    } else {
      $spec = $pathOrSpec;
    }

    return new InputModel($spec, $in);
  }

  /**
   * @param string $id
   * @param string $path
   *
   * @return \Pterobilling\LaraExtension\Specs\FormModel
   */
  public function formModel($id, $path)
  {
    return new FormModel($id, $this->make($path));
  }
}
