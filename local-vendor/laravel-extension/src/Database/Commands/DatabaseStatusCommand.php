<?php

namespace Pterobilling\LaraExtension\Database\Commands;

use Pterobilling\LaraVersionia\Commands\DatabaseStatusCommand as BaseCommand;

class DatabaseStatusCommand extends BaseCommand
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
