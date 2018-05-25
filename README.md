jawira/skeleton
===============

The `jawira/skeleton` library creates useful files that are recurrently needed 
in projects (e.g. README.md, .gitignore, build.xml, etc).

[![asciicast](https://asciinema.org/a/LaEDkaGNee0BZLPT6Atqm5K2c.png)](https://asciinema.org/a/LaEDkaGNee0BZLPT6Atqm5K2c)

[![Latest Stable Version](https://poser.pugx.org/jawira/skeleton/v/stable)](https://packagist.org/packages/jawira/skeleton)
[![License](https://poser.pugx.org/jawira/skeleton/license)](https://packagist.org/packages/jawira/skeleton)
[![composer.lock](https://poser.pugx.org/jawira/skeleton/composerlock)](https://packagist.org/packages/jawira/skeleton)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)

How to install
--------------

Install this package with Composer: 

```bash
$ composer require jawira/skeleton
```

Usage
-----

1. Run executable:

    ```bash
    $ vendor/bin/jawira-skeleton
    ```
 
2. Select files you want to create.

Skeleton files
--------------

Skeleton files are located at [resources/warehouse/](). 

Currently the following files can be installed trough executable:

```
.
├── build.xml
├── CHANGELOG.md
├── CONTRIBUTING.md
├── LICENSE
├── Makefile
├── README.md
└── resources
    ├── make
    │   └── phar.mk
    └── phing
        ├── apache2.build.xml
        ├── clamav.build.xml
        ├── composer.build.xml
        ├── open.build.xml
        └── portainer.build.xml
```

Note that the generated files are customized according to my personal needs.

Contributing
------------

To contribute to this project please read [CONTRIBUTING.md](./CONTRIBUTING.md) 
first.

License
-------

This project is under the [GNU GPLv3 license](./LICENSE).
