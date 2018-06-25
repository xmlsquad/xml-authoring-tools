<?php

namespace XmlSquad\Tools;

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME = 'XmlSquad Tools';
    const VERSION = '0.2.1';

    public function __construct($name = self::NAME, $version = self::VERSION)
    {
        parent::__construct($name, $version);

        if (class_exists('XmlSquad\Example\Command\HelloWorldCommand')) {
            $this->add(
                new \XmlSquad\Example\Command\HelloWorldCommand()
            );
        }

        if (class_exists('XmlSquad\PingDrive\Command\PingDriveCommand')) {
            $this->add(
                new \XmlSquad\PingDrive\Command\PingDriveCommand()
            );
        }

        if (class_exists('XmlSquad\GsheetXml\Command\GsheetToXmlCommand')) {
            $this->add(
                new \XmlSquad\GsheetXml\Command\GsheetToXmlCommand()
            );
        }

        if (class_exists('XmlSquad\CaptureLookups\Command\CaptureLookupsCommand')) {
            $this->add(
                new \XmlSquad\CaptureLookups\Command\CaptureLookupsCommand()
            );
        }
    }
}