.DEFAULT_GOAL := help

include .makerc
-include resources/make/*.mk

help:	## Print this help
	@grep -Eh '^[[:alnum:][:blank:]/\._-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-25s\033[0m %s\n", $$1, $$2}'
.PHONY: help

.makerc:	## Create variables' file
	cp .makerc.dist .makerc

/usr/local/bin/symfony:	## Symfony CLI tool
	wget https://get.symfony.com/cli/installer -O - | bash
	mv ~/.symfony/bin/symfony /usr/local/bin/symfony
	chmod +x /usr/local/bin/symfony
