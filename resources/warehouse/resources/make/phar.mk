bin/phpunit.phar:	## Testing framework - https://phpunit.de/
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://phar.phpunit.de/phpunit-7.phar
	@chmod +x $@
	$@ --version

bin/composer.phar:	## Dependency Manager - https://getcomposer.org/
	@mkdir -p $(@D)
	@wget --no-verbose -O composer-setup.php https://getcomposer.org/installer
	@php composer-setup.php --install-dir=$(@D) --filename=$(@F) --version=1.6.3
	@rm -f composer-setup.php
	@chmod +x $@
	$@ --version

bin/deployer.phar:	## Deployment Tool - https://deployer.org/download
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://deployer.org/releases/v6.1.0/deployer.phar
	@chmod +x $@
	$@ --version

bin/phing.phar:	## Build tool - https://www.phing.info/
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://www.phing.info/get/phing-3.0.0-alpha1.phar
	@chmod +x $@
	$@ -v

bin/blackfire-player.phar:	## Web Crawling, Web Testing, and Web Scraper - https://blackfire.io/docs/player/index
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ http://get.blackfire.io/blackfire-player-v0.4.6.phar
	@chmod +x $@
	$@ --version

bin/phpbench.phar:	## Benchmarking framework - http://phpbench.readthedocs.io/en/latest/installing.html
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://phpbench.github.io/phpbench/phpbench.phar
	@wget --no-verbose -O $@.pubkey https://phpbench.github.io/phpbench/phpbench.phar.pubkey
	@chmod +x $@
	$@ --version

bin/couscous.phar:	## Static site builder for documentation - http://couscous.io/docs/getting-started.html
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ http://couscous.io/couscous.phar
	@chmod +x $@
	$@ --version

bin/wp-cli.phar:	## Command-line interface for WordPress - https://wp-cli.org/
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
	@chmod +x $@
	$@ --info

bin/phpmd.phar:	## Look for potential problems in source code - https://phpmd.org/
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ http://static.phpmd.org/php/latest/phpmd.phar
	@chmod +x $@
	$@ --version
