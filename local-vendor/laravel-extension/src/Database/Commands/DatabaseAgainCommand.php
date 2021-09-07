<?php

namespace Pterobilling\LaraExtension\Database\Commands;

use Pterobilling\LaraVersionia\Commands\DatabaseAgainCommand as BaseCommand;

class DatabaseAgainCommand extends BaseCommand
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
