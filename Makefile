## —— 🎵 The braunstetter/menu-bundle Makefile 🎵 ————————————————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9\./_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

phpunit: ## Run phpunit tests
	vendor/bin/simple-phpunit -vvv

## —— Coding Style ————————————————————————————————————————————————————————————————

ecs: ## Run ecs
	vendor/bin/ecs check --fix

## —— Code quality—————————————————————————————————————————————————————————————————
psalm: ## Run psalm
	vendor/bin/psalm --clear-cache
	vendor/bin/psalm --clear-global-cache
	vendor/bin/psalm

phpstan: ## Run phpstan
	vendor/bin/phpstan analyse

lint: ecs phpstan psalm ## Run all linters and code quality tools
code-check: lint phpunit ## Run all code quality tools and tests
