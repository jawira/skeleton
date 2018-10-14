Changelog
=========

All notable changes to this project will be documented in this file.

<!---
Types of changes:
### Added       for new features.
### Changed     for changes in existing functionality.
### Deprecated  for soon-to-be removed features.
### Removed     for now removed features.
### Fixed       for any bug fixes.
### Security    in case of vulnerabilities.
-->

Unreleased
----------

### Added

- New CONTRIBUTING.md file in the root of the project

### Fixed

- Added hidden files to tree in README.md (phing readme:update)

v1.5.0 - 2018-10-02
-------------------

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

- Composer has `ext-mbstring` as requirement, this is required by CLImate

v1.4.0 - 2018-07-26
-------------------

### Added 

- `docker-compose.build.xml` buildfile added to warehouse

v1.3.1 - 2018-07-21
-------------------

### Changed

- `.idea` folder was added to `DefaultExclude`, which is called every time in 
[resources/warehouse/build.xml]()
- Improving CONTRIBUTING.md template

v1.3.0 - 2018-06-25
-------------------

### Added

- `.gitattributes` added to warehouse
- `.editorconfig` added to warehouse

### Changed

- Composer buildfiles does install/update with `--prefer-dist` option 

v1.2.0 - 2018-06-18
-------------------

### Added

- Add `localheinz/composer-normalize` as suggestion in composer.json
- Add pds-skeleton badge in readme file
- PHP buildfile

v1.1.1 - 2018-05-22
-------------------

### Fixed

- Fixing annotation namespaces in WarehouseManager.php

v1.1.0 - 2018-05-18
-------------------

### Added

- PHP Mess Detector was added to phar.mk makefile

### Changed

- Improving clamav buildfile to install, add PHP malware signatures and update
virus database.

v1.0.0 - 2018-04-21
-------------------

### Added

- Since this project had become a library, the skeleton files are crated using 
binary `bin/jawira-skeleton`

### Changed

- Readme file was updated with new project name
- Repository changed its name from `defaults` to `skeleton`
- Composer.json was modified to become a library

### Removed

- Since this project is a Composer library, the Composer plugin was removed

v0.2.0 - 2018-04-14
-------------------

### Added

- Two new buildfiles for Phing
- Added wp-cli to phar.mk

v0.1.0 - 2018-04-04
-------------------

### Added

- Simple `.gitignore` were created
- Distributable `.makerc.dist` were created
- New buildfiles added for Phing: apach2, composer and portainer

### Changed

- `jawira/defaults` is going to copy all the content from `./resources/defaults/` 
recursively
- The creation of phar files were extracted from `Makefile` to `resources/make/phar.mk`


v0.0.2 - 2018-02-28
-------------------

### Added

- Pugx Badges and gif animation in [README.md](./README.md)
- Added [GLPv3 LICENSE](resources/warehouse/LICENSE) 

### Changed

- Default files were moved to `./resources/defaults/` dir

v0.0.1 - 2018-02-26
-------------------

### Fixed

- A valid SPDX license was added to [composer.json](./composer.json)

v0.0.0 - 2018-02-25
-------------------

### Added

- First full working version
- Final Production files are located in ./resources/
