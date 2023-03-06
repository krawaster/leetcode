help:
	@echo '--------------------'
	@echo 'Available commands: '
	@echo '--------------------'
	@echo 'make up                      - start environment deatached'
	@echo 'make start                   - run project with composer install, migrations and generation of openapi'
	@echo 'make build                   - rebuild environment'
	@echo 'make down                    - stop environment'
	@echo 'make install                 - install composer dependency with php from container'
	@echo 'make enter-php               - enter container with PHP'
	@echo 'make stop        			- suspend existing containers'
	@echo 'make run        				- run suspended containers'

container=php-fpm

up:
	cd docker && docker-compose up -d

build:
	cd docker && docker-compose rm -vsf
	cd docker && docker-compose down -v --remove-orphans
	cd docker && docker-compose build
	cd docker && docker-compose up -d

start:
	cd docker && docker-compose up -d
	cd docker && docker-compose run ${container} composer install

down:
	cd docker && docker-compose down

install:
	cd docker && docker-compose run ${container} composer install

enter-php:
	cd docker && docker-compose run webserver bash

enter-php-fpm:
	cd docker && docker-compose run ${container} sh

tail-logs:
	cd docker docker-compose logs -f ${container}

stop:
	cd docker docker-compose stop

run:
	cd docker docker-compose start

