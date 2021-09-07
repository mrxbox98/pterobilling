<?php

namespace Pterobilling\LaraExtension\Addons\Commands;

use Pterobilling\LaraAddomnipot\Commands\AddonNameCommand as BaseCommand;

class AddonNameCommand extends BaseCommand
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
