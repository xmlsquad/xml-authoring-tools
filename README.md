# xml-authoring-tools
A composer library of tools to help build and manage an [xml-authoring-project](https://github.com/forikal-uk/xml-authoring-project).

# Installation 

We assume that you have installed :

* [Composer](https://getcomposer.org/doc/00-intro.md) (installed globally)

## Use in context of a xml authoring project

In most cases you will run the tools in the context of an xml authoring project.

See instructions on [how to install the tools from within a client's working directory](https://github.com/forikal-uk/xml-authoring-project/blob/master/README.md#ensure-the-tools-are-installed).

## Install via Composer

Using your operating system's terminal, navigate to the root of a working directory. 

Run:

```
$ composer require forikal-uk/xml-authoring-tools
```

This will load the latest version of this project in a 'vendor' directory. 

## Usage

Ensure we have run composer update. 

Then, run:

```
$ php src/application.php 
```


# Developing new commands

We assume that you have installed the requirments above, and:

* [Git SCM](https://git-scm.com/) 
* [Symfony 3.4 Console](https://symfony.com/doc/3.4/components/console.html)

The command should be written to run in a Symfony 3.4 console application.

See [Symfony's documentation on creating commands](https://symfony.com/doc/3.4/console.html).

## Requirements

New commands should:

* have their own git repository project
* have tests (one or more of PHPUnit/Behat/etc) stored within the project repository
* be compatible with Symfony 3.4, and 
* make good use of the `symfony/console` project. i.e. `$ composer require symfony/console:~3.4`
* be installed by end users as a composer package
* reuse existing libraries where possible. Such as;
  *  [PHP's Standard PHP Library](http://php.net/manual/en/book.spl.php) 
* use [PSR-4 autoloading](https://www.php-fig.org/psr/psr-4/) where possible.
* be cross-platform compatible; Run on the command line on Windows 10, MacOS High Sierra and Linux.
* provide README.md instructions on how to install and use the command from .



  



