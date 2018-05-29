<?php

namespace Forikal\Tools\Tests\Command;

use Forikal\Tools\Application;
use Forikal\Tools\Command\HelloWorldCommand;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

final class HelloWorldCommandTest extends TestCase
{
    public function setUp()
    {
        if (file_exists('/tmp/HelloWorld.txt')) {
            unlink('/tmp/HelloWorld.txt');
        }
    }

    public function tearDown()
    {
        unlink('/tmp/HelloWorld.txt');
    }

    public function testExecute()
    {
        $application = new Application();

        $command = $application->find(HelloWorldCommand::NAME);
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),
            '--targetDirectory'=>'/tmp',
            '--configFilename' => 'scapesettings.yml.dist',
        ));

        $output = $commandTester->getDisplay();
        $this->assertContains("[HelloWorld.txt] successfully written.\n", $output);

        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),
            '--targetDirectory'=>'/tmp',
            '--configFilename' => 'scapesettings.yml.dist',
        ));
        $output = $commandTester->getDisplay();
        $this->assertContains("[HelloWorld.txt] already exists.\n", $output);
    }
}
