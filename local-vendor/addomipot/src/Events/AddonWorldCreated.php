<?php

namespace Pterobilling\LaraAddomnipot\Events;

use Pterobilling\LaraAddomnipot\Environment;

class AddonWorldCreated
{
  public $world;

  public function __construct(Environment $world)
  {
    $this->world = $world;
  }
}
