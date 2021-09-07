<?php

namespace Pterobilling\LaraExtension\Addons\Commands;

use Pterobilling\LaraAddomnipot\Commands\AddonStatusCommand as BaseCommand;

class AddonStatusCommand extends BaseCommand
{
  /**
   * Create a new console command instance.
   */
  public function __construct()
  {
    $this->description = '[+] ' . $this->description;

    parent::__construct();
  }
}
