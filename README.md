# xml-authoring-tools

A composer library of tools to help build and manage an [xml-authoring-project](https://github.com/forikal-uk/xml-authoring-project).

In most cases you will run the tools in the context of an xml authoring project.

## Prerequisites

* Git
* PHP `5.5.9+`
* [Composer installed](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) globally

## Using at xml-authoring-project

* Put next lines at project's `composer.json`:

    ```yaml
    "config": {
        "bin-dir": "bin"
    }
    ```

* Require tools library:
 
    ```bash 
    composer require forikal-uk/xml-authoring-tools
    ```
    
* Try `hello-world` command:

    ```bash
    # Copy example config
    cp vendor/forikal-uk/xml-authoring-tools/scapesettings.yml.dist ./scapesettings.yml
    
    # Try
    bin/console hello-world
    ```
    
* Add next files to to `.gitignore` if they placed inside repository:

    * `scapesettings.yml`
    * `HelloWorld.txt` 

## Contribute

```bash
cd ~/
git clone https://github.com/forikal-uk/xml-authoring-tools.git
cd xml-authoring-tools

# Install
composer install --dev

# Make you own feature branch
git checkout -b feature-XXX

# Make changes with tests
# ...

# Make sure tests are passing
vendor/bin/phpunit

# Push your changes
git push origin feature-XXX
```

### Building own command

* New commands should:

    * be written to run in a Symfony 3.4 console application. See [Symfony's documentation on creating commands](https://symfony.com/doc/3.4/console.html).have their own git repository project
    * have tests (one or more of PHPUnit/Behat/etc) stored within the project repository
    * be compatible with Symfony 3.4, and 
    * make good use of the `symfony/console` project. i.e. `$ composer require symfony/console:~3.4`
    * adhere to the [convention that allows the command to be automatically registered](https://symfony.com/doc/3.4/console.html#registering-the-command).
    * be installed by end users as a composer package
    * reuse existing libraries where possible. Such as;
      *  [PHP's Standard PHP Library](http://php.net/manual/en/book.spl.php) 
    * use [PSR-4 autoloading](https://www.php-fig.org/psr/psr-4/) where possible.
    * be cross-platform compatible; Run on the command line on Windows 10, MacOS High Sierra and Linux.
    * provide README.md instructions on how to install and use the command from .


* Code reuse example:

    ```php
    # src/Command/NewCommand.php
    namespace Forikal\PackageName\Command;
    
    use Forikal\Tools\Command\AbstractCommand;
    
    class NewCommand extends AbstractCommand
    {
        public function __construct()
        {
            # Specify command's name
            parent::__construct('new-command');
        }
    
        /**
         * {@inheritdoc}
         */
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            try {
                $configFilename = $input->getOption('configFilename');
                $configOptions = $this->getConfigOptions($configFilename);
    
                dump($configOptions);
            } catch (FileNotFoundException $e) {
                $output->writeln(
                    $e->getMessage()
                );
            }
        }
    }
    ```

## Test

```bash
cd ~/
git clone https://github.com/forikal-uk/xml-authoring-tools.git
cd xml-authoring-tools
composer install --dev
vendor/bin/phpunit
```