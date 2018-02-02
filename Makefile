build:
	@docker run --rm -it \
		-v $$(pwd):/app:delegated \
		-v ~/.composer:/tmp:delegated \
		composer install

docs-test: ## Run docs test server
	docker run --rm -it -p 8000:8000 -v $$(pwd):/docs squidfunk/mkdocs-material

docs-build: ## Build the mkdocs documentation
	docker run --rm -it -v $$(pwd):/docs squidfunk/mkdocs-material build

docs-deploy: ## Deploy the mkdocs documentation
	docker run --rm -it -v ~/.ssh:/root/.ssh -v $$(pwd):/docs -e GITHUB_TOKEN squidfunk/mkdocs-material gh-deploy

lint: ## Check the validness of markdown/php
lint: lint-md lint-php

lint-md: ## Check the validness of markdown
	@echo 'linting markdown...'
	@docker run --rm -v $$(pwd):/data:cached gouvinb/docker-markdownlint -v *.md standards/*.md

lint-php: ## Check the validness of php
	@echo 'linting php...'
	@mkdir -p cache
	@docker run --rm -it -v $$(pwd):/srv:cached graze/php-alpine:test vendor/bin/phpcs \
		-p --warning-severity=0 --cache=cache/phpcs --parallel=10 \
		PHP/ examples/
