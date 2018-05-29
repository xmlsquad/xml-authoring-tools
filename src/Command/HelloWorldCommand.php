<?php

namespace Forikal\Tools\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * Class HelloWorldCommand
 */
class HelloWorldCommand extends AbstractCommand
{
    const NAME = 'hello-world';
    const FILENAME = 'HelloWorld.txt';
    const CONFIG_ROOT_KEY = 'hello_world';
    const CONFIG_NAME_KEY = 'name';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();

        $this
            ->setName(self::NAME)
            ->setDescription('Example command')
            ->addOption('targetDirectory', 'd', InputOption::VALUE_REQUIRED, 'Name of directory to write to', './')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $targetDirectory = rtrim($input->getOption('targetDirectory'), '/');
            $targetFilename = $targetDirectory . DIRECTORY_SEPARATOR . self::FILENAME;
            if (file_exists($targetFilename)) {
                $output->writeln(sprintf('[%s] already exists.', self::FILENAME));
                return;
            }

            $configFilename = $input->getOption('configFilename');
            $configOptions = $this->getConfigOptions($configFilename);

            $name = $configOptions[self::CONFIG_ROOT_KEY][self::CONFIG_NAME_KEY];
            $message = sprintf('Hello world, %s', $name);
            $this->filesystem->dumpFile($targetFilename, $message);
            $output->writeln(sprintf('[%s] successfully written.', self::FILENAME));
        } catch (FileNotFoundException $e) {
            $output->writeln(
                $e->getMessage()
            );
        }
    }

}