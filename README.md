jawira/skeleton
===============

The `jawira/skeleton` library creates useful files that are recurrently needed 
in projects (e.g. README.md, .gitignore, build.xml, etc).

[![asciicast](https://asciinema.org/a/LaEDkaGNee0BZLPT6Atqm5K2c.png)](https://asciinema.org/a/LaEDkaGNee0BZLPT6Atqm5K2c)

[![Latest Stable Version](https://poser.pugx.org/jawira/skeleton/v/stable)](https://packagist.org/packages/jawira/skeleton)
[![License](https://poser.pugx.org/jawira/skeleton/license)](https://packagist.org/packages/jawira/skeleton)
[![composer.lock](https://poser.pugx.org/jawira/skeleton/composerlock)](https://packagist.org/packages/jawira/skeleton)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)
[![Issues](https://img.shields.io/github/issues/jawira/skeleton.svg?label=HuBoard&color=694DC2)](https://huboard.com/jawira/skeleton)
[![HitCount](http://hits.dwyl.io/jawira/skeleton.svg)](http://hits.dwyl.io/jawira/skeleton)

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

Currently, the following files can be installed trough executable:

<!--tree:start-->
```
resources/warehouse/
├── build.xml
├── CHANGELOG.md
├── .codeclimate.yml
├── CODE_OF_CONDUCT.md
├── composer.json
├── docker-compose.yml
├── Dockerfile
├── .editorconfig
├── .gitattributes
├── .gitignore
├── LICENSE.md
├── Makefile
├── phive.xml
├── README.md
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
│       └── xdebug.build.xml
└── .travis.yml

3 directories, 27 files
```
<!--tree:end-->

Note all files are customized according to my personal needs.

License
-------

This project is under the [GNU GPLv3 license](./LICENSE).
