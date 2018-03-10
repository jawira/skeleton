bin/phpunit.phar:	## PHPUnit 7 - https://phpunit.de/
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://phar.phpunit.de/phpunit-7.phar
	@chmod +x $@
	$@ --version

bin/composer.phar:	## Composer - https://getcomposer.org/
	@mkdir -p $(@D)
	@wget --no-verbose -O composer-setup.php https://getcomposer.org/installer
	@php composer-setup.php --install-dir=$(@D) --filename=$(@F) --version=1.6.3
	@rm -f composer-setup.php
	@chmod +x $@
	$@ --version

bin/deployer.phar:	## Deployer - https://deployer.org/download
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://deployer.org/releases/v6.1.0/deployer.phar
	@chmod +x $@
	$@ --version

bin/phing.phar:	## Phing - https://www.phing.info/
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://www.phing.info/get/phing-2.16.1.phar
	@chmod +x $@
	$@ -v

bin/blackfire-player.phar:	## Blackfire Player - https://blackfire.io/docs/player/index
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ http://get.blackfire.io/blackfire-player-v0.4.6.phar
	@chmod +x $@
	$@ --version

bin/phpbench.phar:	## PHPBench - http://phpbench.readthedocs.io/en/latest/installing.html
	@mkdir -p $(@D)
	@wget --no-verbose -O $@ https://phpbench.github.io/phpbench/phpbench.phar
	@wget --no-verbose -O $@.pubkey https://phpbench.github.io/phpbench/phpbench.phar.pubkey
	@chmod +x $@
	$@ --version
