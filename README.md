# xml-authoring-tools

A composer library of tools to help build and manage an [xml-authoring-project](https://github.com/forikal-uk/xml-authoring-project).

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

## Test

```bash
cd ~/
git clone https://github.com/forikal-uk/xml-authoring-tools.git
cd xml-authoring-tools
composer install --dev
vendor/bin/phpunit
```