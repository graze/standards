build:
	@docker run --rm -it \
		-v $$(pwd):/usr/src/app \
		-v ~/.composer:/home/composer/.composer \
		-v ~/.ssh/id_rsa:/home/composer/.ssh/id_rsa:ro \
		graze/composer install

lint:
	@docker run --rm -it -v $$(pwd):/srv:cached graze/php-alpine:test vendor/bin/phpcs \
		-p --warning-severity=0 --cache=cache/phpcs --parallel=10 \
		PHP/ examples/
