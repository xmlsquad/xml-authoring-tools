<?php

namespace Forikal\Tools;

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME = 'Forikal Tools';
    const VERSION = '0.1.2';

    public function __construct($name = self::NAME, $version = self::VERSION)
    {
        parent::__construct($name, $version);

        if (class_exists('Forikal\Example\Command\HelloWorldCommand')) {
            $this->add(
                new \Forikal\Example\Command\HelloWorldCommand()
            );
        }

        if (class_exists('Forikal\PingDrive\Commands\PingDriveCommand')) {
            $this->add(
                new \Forikal\PingDrive\Commands\PingDriveCommand()
            );
        }

        if (class_exists('Forikal\GsheetXml\Command\GsheetToXmlCommand')) {
            $this->add(
                new \Forikal\GsheetXml\Command\GsheetToXmlCommand()
            );
        }
    }
}