<?php

namespace Forikal\Tools;

use Symfony\Component\Console\Application as BaseApplication;
use Forikal\Tools\Command\HelloWorldCommand;

class Application extends BaseApplication
{
    const NAME = 'Forikal Tools';
    const VERSION = '0.1.0';

    public function __construct($name = self::NAME, $version = self::VERSION)
    {
        parent::__construct($name, $version);

        $this->add(new HelloWorldCommand());
    }
}