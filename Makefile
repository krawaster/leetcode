help:
	@echo '--------------------'
	@echo 'Available commands: '
	@echo '--------------------'
	@echo 'make up                      - start environment detached'
	@echo 'make start                   - run project with composer install'
	@echo 'make build                   - rebuild environment'
	@echo 'make down                    - stop environment'
	@echo 'make install                 - install composer dependencies'
	@echo 'make enter-php               - enter PHP container (sh)'
	@echo 'make run-script SRC=path     - run PHP script in Docker (e.g. make run-script SRC=src/Stack/EvaluateReversePolishNotation/Solution.php)'
	@echo 'make stop                    - suspend existing containers'
	@echo 'make run                     - run suspended containers'

container=php-fpm

up:
	cd docker && docker compose up -d

build:
	cd docker && docker compose down -v --remove-orphans
	cd docker && docker compose build --no-cache
	cd docker && docker compose up -d

start:
	cd docker && docker compose up -d
	cd docker && docker compose run ${container} composer install

down:
	cd docker && docker compose down

install:
	cd docker && docker compose run ${container} composer install

enter-php:
	cd docker && docker compose run php-fpm sh

enter-php-fpm:
	cd docker && docker compose run ${container} sh

run-script:
	cd docker && docker compose run --rm ${container} php /var/www/html/$(SRC)

tail-logs:
	cd docker && docker compose logs -f ${container}

stop:
	cd docker && docker compose stop

run:
	cd docker && docker compose start

