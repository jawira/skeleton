jawira/skeleton
===============

The `jawira/skeleton` library creates useful files that are recurrently needed 
in projects (e.g. README.md, .gitignore, build.xml, etc).

[![asciicast](https://asciinema.org/a/LaEDkaGNee0BZLPT6Atqm5K2c.png)](https://asciinema.org/a/LaEDkaGNee0BZLPT6Atqm5K2c)

[![Latest Stable Version](https://poser.pugx.org/jawira/skeleton/v/stable)](https://packagist.org/packages/jawira/skeleton)
[![License](https://poser.pugx.org/jawira/skeleton/license)](https://packagist.org/packages/jawira/skeleton)
[![composer.lock](https://poser.pugx.org/jawira/skeleton/composerlock)](https://packagist.org/packages/jawira/skeleton)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)
[![Waffle.io - Columns and their card count](https://badge.waffle.io/jawira/skeleton.svg?columns=all)](https://waffle.io/jawira/skeleton)


How to install
--------------

Install this package with Composer: 

```bash
$ composer require jawira/skeleton:*
```

Usage
-----

1. Run the executable:

    ```bash
    $ vendor/bin/jawira-skeleton
    ```
 
2. Select the files you want to create with `␣` (space key).
 
3. Start copying selected files with `⏎` (enter key).

Skeleton files
--------------

Skeleton files are located at [resources/warehouse/](). 

Currently the following files can be installed trough executable:

<!--tree:start-->
```
resources/warehouse/
├── bin
├── build.xml
├── CHANGELOG.md
├── .codeclimate.yml
├── CODE_OF_CONDUCT.md
├── .composer.json
├── CONTRIBUTING.md
├── docker-compose.yml
├── Dockerfile
├── .editorconfig
├── gitattributes
├── gitignore
├── LICENSE.md
├── Makefile
├── .makerc.dist
├── phive.xml
├── .README.md
├── resources
│   ├── make
│   │   └── phar.mk
│   └── phing
│       ├── apache2.build.xml
│       ├── changelog.build.xml
│       ├── clamav.build.xml
│       ├── code-climate.build.xml
│       ├── composer.build.xml
│       ├── docker-compose.build.xml
│       ├── git.build.xml
│       ├── open.build.xml
│       ├── php.build.xml
│       ├── phpstan.build.xml
│       ├── portainer.build.xml
│       └── xdebug.build.xml
├── .travis.yml
└── vendor
    ├── autoload.php
    ├── bin
    └── composer
        ├── autoload_classmap.php
        ├── autoload_namespaces.php
        ├── autoload_psr4.php
        ├── autoload_real.php
        ├── autoload_static.php
        ├── ClassLoader.php
        ├── installed.json
        └── LICENSE

7 directories, 39 files
```
<!--tree:end-->

Note all files are customized according to my personal needs.

Contributing
------------

To contribute to this project please read [CONTRIBUTING.md](./CONTRIBUTING.md) 
first.

License
-------

This project is under the [GNU GPLv3 license](./LICENSE).
