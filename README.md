Defaults
========

The `jawira/defaults` package generates default project files (README.md, CONTRIBUTING.md, 
LICENSE, etc) at the root of your project.

The files are automatically created as soon this package is required by Composer.

![composer require jawira/defaults](resources/images/jawira-defaults.gif)

[![Latest Stable Version](https://poser.pugx.org/jawira/defaults/v/stable)](https://packagist.org/packages/jawira/defaults)
[![License](https://poser.pugx.org/jawira/defaults/license)](https://packagist.org/packages/jawira/defaults)
[![composer.lock](https://poser.pugx.org/jawira/defaults/composerlock)](https://packagist.org/packages/jawira/defaults)


How to install
--------------

1. Install this package with Composer: 

    ```bash
    $ composer require jawira/defaults
    ```

2. While Composer is running the following files are going to be created in the 
root of the project:

    | File                                                      | Description                           |
    |-----------------------------------------------------------|---------------------------------------|
    | [.gitignore](./resources/defaults/.gitignore)             | Git ignore file                       |
    | [.makefile.dist](./resources/defaults/.makefile.dist)     | Make's distributable variables file   |
    | [build.xml](./resources/defaults/build.xml)               | Phing buildfile template              |
    | [CHANGELOG.md](./resources/defaults/CHANGELOG.md)         | a log of changes between releases     |
    | [CONTRIBUTING.md](./resources/defaults/CONTRIBUTING.md)   | guidelines for contributors           |
    | [LICENSE](./resources/defaults/LICENSE)                   | licensing information                 |
    | [Makefile](./resources/defaults/Makefile)                 | Makefile template                     |
    | [README.md](./resources/defaults/README.md)               | information about the package itself  |
    | [resources/make/phar.mk](./resources/defaults/resources/make/phar.mk) | Makefile with phar rules  |

3. Once installed you can immediately uninstall this package:

    ```bash
    $ composer remove jawira/defaults
    ```


How it works
------------

This package uses a Composer plugin, that's why files can be created while the 
package itself it's being installed.

Note that the generated files are customized according to my personal needs.

Contributing
------------

To contribute to this project please read [CONTRIBUTING.md](./CONTRIBUTING.md) 
first.


License
-------

This project is under the [GNU GPLv3 license](./LICENSE).
