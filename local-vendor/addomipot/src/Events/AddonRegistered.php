<?php

namespace Pterobilling\LaraAddomnipot\Events;

use Pterobilling\LaraAddomnipot\Environment;

class AddonRegistered
{
  public $world;

  public function __construct(Environment $world)
  {
    $this->world = $world;
  }
}
