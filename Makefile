.DEFAULT_GOAL := help

.PHONY: help
help: ## Show available commands
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

.PHONY: pint
pint: ## Run Pint code style fixer
	@export XDEBUG_MODE=off
	@$(CURDIR)/vendor/bin/pint --parallel
	@unset XDEBUG_MODE

.PHONY: rector
rector: ## Run Rector
	@$(CURDIR)/vendor/bin/rector process

.PHONY: setup
setup: ## Setup the project
	@composer install
	@npm install
	@composer run-script post-root-package-install
	@composer run-script post-create-project-cmd
	@php artisan key:generate --ansi
	@php artisan storage:link --ansi
	@composer run-script ide-helper
