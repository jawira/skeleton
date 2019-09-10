# Changelog

All notable changes to this project will be documented in this file.

<!--
Types of changes:
### Added       for new features.
### Changed     for changes in existing functionality.
### Deprecated  for soon-to-be removed features.
### Removed     for now removed features.
### Fixed       for any bug fixes.
### Security    in case of vulnerabilities.
-->

## Unreleased

### Changed

- Adding `wp-cli` phar

## [v1.12.0] - 2019-08-31

### Changed

- Updated changelog file to be compatible with `symplify/changelog-linker`
- Added `git:identity` target into `git.build.xml`
- Added `jawira/emoji-catalog` reference into `README.md`
- Update `.editorconfig` with `.xsl` format

## [v1.11.0] - 2019-08-21

### Changed

- You can add Symfony CLI with make
- Add own projects to Readme file
- Add HuBoard reference to Readme file
- Add more extensions to editorconfig

## [v1.10.0] - 2019-08-21

### Changed

- Add preferred install in composer.json
- Add more phar files to download

## [v1.9.1] - 2019-06-23

### Added

- Phive: `bin/phpcs` & `bin/phpcbf`
- xdebug buildfiles

### Changed

- Improved `.travis.yml` and `Dockerfile`
- Changing default license to MIT

## [v1.9.0] - 2019-04-06

### Added

- Add `composer:diagnose` target
- [#21] Add waffle.io badge to readme file
- [#20] Add automatic proxy configuration to buildfile
- Updating [resources/warehouse/phive.xml]() with default directory.
- [#23] Adding `php-eye` link to [resources/warehouse/README.md]()
- [#24] Setting default name in [docker compose buildfile](resources/warehouse/resources/phing/docker-compose.build.xml)
- Add link for PHPPackages badges
- resources/warehouse/.codeclimate.yml
- resources/warehouse/.travis.yml
- resources/warehouse/resources/phing/changelog.build.xml
- resources/warehouse/resources/phing/changelog.build.xml
- resources/warehouse/resources/phing/code-climate.build.xml
- resources/warehouse/resources/phing/git.build.xml
- resources/warehouse/resources/phing/phpstan.build.xml

### Updated

- resources/warehouse/phive.xml

### Removed

- resources/warehouse/resources/phing/get.build.xml - use Phive instead

## [v1.8.0] - 2019-01-03

### Added

- Added [phive.xml](resources/warehouse/phive.xml) to skeleton files.

### Fixed

- [#19] Files from _warehouse_ were copied in wrong _resources_ directory.

## [v1.7.0] - 2018-12-14

### Changed

- Small change in Readme
- [#17] Adding prefix to avoid problems with git's dot files
- [#18] `jawira-skeleton` works in dev environment

### Added

- New file [composer.json](resources/warehouse/composer.json) to be used as 
template. This file will never appear when using `bin/jawira-skeleton`.
- The task `composer:outdated` was added in 
[resources/warehouse/resources/phing/composer.build.xml]()

## [v1.6.0] - 2018-10-20

### Added

- New CONTRIBUTING.md file in the root of the project
- New buildfile [resources/warehouse/resources/phing/get.build.xml](), this 
buildfile allows to download well known Phar files: composer, behat, phpunit.
- Versioning dictionary [.idea/dictionaries/jawira.xml]()

### Fixed

- Added hidden files to tree in README.md (phing readme:update)

### Changed

- Added `.idea` dir in [resources/warehouse/.gitattributes]()

## [v1.5.0] - 2018-10-02

### Added

- Dockerfile containing PHP and Apache
- docker-compose.yml was added
- File tree in Readme file can be automatically updated using Phing's 
`readme:update` target
- Including badges links into `README.md`
- Added `resources/warehouse/CODE_OF_CONDUCT.md`

### Changed

- Added `phpcompatinfo.phar` into `phar.mk`
- Added more subtitles to `README.md`
- New subtitle in `resources/warehouse/CONTRIBUTING.md`

### Fixed

- Composer has `ext-mbstring` as requirement, this is required by Climate

## [v1.4.0] - 2018-07-26

### Added 

- `docker-compose.build.xml` buildfile added to warehouse

## [v1.3.1] - 2018-07-21

### Changed

- `.idea` folder was added to `DefaultExclude`, which is called every time in 
[resources/warehouse/build.xml]()
- Improving CONTRIBUTING.md template

## [v1.3.0] - 2018-06-25

### Added

- `.gitattributes` added to warehouse
- `.editorconfig` added to warehouse

### Changed

- Composer buildfiles does install/update with `--prefer-dist` option 

## [v1.2.0] - 2018-06-18

### Added

- Add `localheinz/composer-normalize` as suggestion in composer.json
- Add pds-skeleton badge in readme file
- PHP buildfile

## [v1.1.1] - 2018-05-22

### Fixed

- Fixing annotation namespaces in WarehouseManager.php

## [v1.1.0] - 2018-05-18

### Added

- PHP Mess Detector was added to phar.mk makefile

### Changed

- Improving clamav buildfile to install, add PHP malware signatures and update
virus database.

## [v1.0.0] - 2018-04-21

### Added

- Since this project had become a library, the skeleton files are crated using 
binary `bin/jawira-skeleton`

### Changed

- Readme file was updated with new project name
- Repository changed its name from `defaults` to `skeleton`
- Composer.json was modified to become a library

### Removed

- Since this project is a Composer library, the Composer plugin was removed

## [v0.2.0] - 2018-04-14

### Added

- Two new buildfiles for Phing
- Added wp-cli to phar.mk

## [v0.1.0] - 2018-04-04

### Added

- Simple `.gitignore` were created
- Distributable `.makerc.dist` were created
- New buildfiles added for Phing: apache2, composer and portainer

### Changed

- `jawira/defaults` is going to copy all the content from `./resources/defaults/` 
recursively
- The creation of phar files were extracted from `Makefile` to `resources/make/phar.mk`


## [v0.0.2] - 2018-02-28

### Added

- Pugx Badges and gif animation in [README.md](./README.md)
- Added [GLPv3 LICENSE](resources/warehouse/LICENSE) 

### Changed

- Default files were moved to `./resources/defaults/` dir

## [v0.0.1] - 2018-02-26

### Fixed

- A valid SPDX license was added to [composer.json](./composer.json)

## [v0.0.0] - 2018-02-25

### Added

- First full working version
- Final Production files are located in ./resources/

[#17]: https://github.com/jawira/skeleton/pull/17
[#18]: https://github.com/jawira/skeleton/pull/18
[#19]: https://github.com/jawira/skeleton/pull/19
[#20]: https://github.com/jawira/skeleton/pull/20
[#21]: https://github.com/jawira/skeleton/pull/21
[#23]: https://github.com/jawira/skeleton/pull/23
[#24]: https://github.com/jawira/skeleton/pull/24
[v0.0.1]: https://github.com/jawira/skeleton/compare/v0.0.0...v0.0.1
[v0.0.2]: https://github.com/jawira/skeleton/compare/v0.0.1...v0.0.2
[v0.1.0]: https://github.com/jawira/skeleton/compare/v0.0.2...v0.1.0
[v0.2.0]: https://github.com/jawira/skeleton/compare/v0.1.0...v0.2.0
[v1.0.0]: https://github.com/jawira/skeleton/compare/v0.2.0...v1.0.0
[v1.1.0]: https://github.com/jawira/skeleton/compare/v1.0.0...v1.1.0
[v1.1.1]: https://github.com/jawira/skeleton/compare/v1.1.0...v1.1.1
[v1.10.0]: https://github.com/jawira/skeleton/compare/v1.9.1...v1.10.0
[v1.11.0]: https://github.com/jawira/skeleton/compare/v1.10.0...v1.11.0
[v1.2.0]: https://github.com/jawira/skeleton/compare/v1.1.1...v1.2.0
[v1.3.0]: https://github.com/jawira/skeleton/compare/v1.2.0...v1.3.0
[v1.3.1]: https://github.com/jawira/skeleton/compare/v1.3.0...v1.3.1
[v1.4.0]: https://github.com/jawira/skeleton/compare/v1.3.1...v1.4.0
[v1.5.0]: https://github.com/jawira/skeleton/compare/v1.4.0...v1.5.0
[v1.6.0]: https://github.com/jawira/skeleton/compare/v1.5.0...v1.6.0
[v1.7.0]: https://github.com/jawira/skeleton/compare/v1.6.0...v1.7.0
[v1.8.0]: https://github.com/jawira/skeleton/compare/v1.7.0...v1.8.0
[v1.9.0]: https://github.com/jawira/skeleton/compare/v1.8.0...v1.9.0
[v1.9.1]: https://github.com/jawira/skeleton/compare/v1.9.0...v1.9.1
[v1.12.0]: https://github.com/jawira/skeleton/compare/v1.11.0...v1.12.0
