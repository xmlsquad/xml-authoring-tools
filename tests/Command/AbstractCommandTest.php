<?php

namespace Forikal\Tools\Tests\Command;

use Forikal\Tools\Command\AbstractCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

final class AbstractCommandTest extends TestCase
{
    /**
     * @test
     */
    public function getConfigFilenameExceptionTest()
    {
        /** @var AbstractCommand $stub */
        $stub = $this->getMockForAbstractClass(AbstractCommand::class);
        $foo = self::getPrivateMethod($stub, 'getConfigFilename');
        self::expectException(FileNotFoundException::class);
        self::expectExceptionMessage('Configuration file not found.');
        $foo->invoke($stub, 'config.yml');
    }

    /**
     * @test
     * @dataProvider getConfigFilenameDataProvider
     */
    public function getConfigFilenameTest($configFilename, $expected)
    {
        /** @var AbstractCommand $stub */
        $stub = $this->getMockForAbstractClass(AbstractCommand::class);
        $foo = self::getPrivateMethod($stub, 'getConfigFilename');
        self::assertEquals(
            $expected,
            $foo->invoke($stub, $configFilename)
        );
    }

    /**
     * @return array
     */
    public function getConfigFilenameDataProvider()
    {
        return [
            ['README.md', getcwd() . '/README.md'],
            ['xml-authoring-tools', getcwd()],
        ];
    }

    /**
     * @test
     * @dataProvider isRootDirectoryDataProvider
     */
    public function isRootDirectoryTest($directory, $expected)
    {
        /** @var AbstractCommand $stub */
        $stub = $this->getMockForAbstractClass(AbstractCommand::class);
        $foo = self::getPrivateMethod($stub, 'isRootDirectory');
        self::assertEquals(
            $expected,
            $foo->invoke($stub, $directory)
        );
    }

    /**
     * @return array
     */
    public function isRootDirectoryDataProvider()
    {
        return [
            ['/some/path', false],
            ['/', true],
        ];
    }

    /**
     * Get a private or protected method for testing/documentation purposes.
     * How to use for MyClass->foo():
     *      $cls = new MyClass();
     *      $foo = self::getPrivateMethod($cls, 'foo');
     *      $foo->invoke($cls, $...);
     * @param object $obj The instantiated instance of your class
     * @param string $name The name of your private/protected method
     * @return \ReflectionMethod The method you asked for
     */
    public static function getPrivateMethod($obj, $name)
    {
        $class = new \ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
