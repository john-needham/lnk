build:
	docker-compose build --no-cache
	@make -s clean

run:
	docker-compose up -d --build nginx php composer mariadb

stop:
	@docker-compose stop

project:
	docker-compose run composer sh -c "composer create-project --prefer-dist laravel/laravel $(project)"

restart: stop run

clean:
	@docker system prune --volumes --force

test: run
	docker-compose exec php sh -c "vendor/bin/phpunit ./tests/" || (docker-compose down --remove-orphans && exit 1)
	docker-compose down --remove-orphans

test-exec: docker exec php sh -c "vendor/bin/phpunit ./tests/"