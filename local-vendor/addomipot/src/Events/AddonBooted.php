<?php

namespace Pterobilling\LaraAddomnipot\Events;

use Pterobilling\LaraAddomnipot\Environment;

class AddonBooted
{
  public $world;

  public function __construct(Environment $world)
  {
    $this->world = $world;
  }
}
