build:
	docker-compose build --no-cache
	@make -s clean

run:
	docker-compose up -d --build __PROJECT___nginx __PROJECT___php __PROJECT___composer __PROJECT___db

stop:
	@docker-compose stop

project:
	docker-compose run __PROJECT___composer sh -c "composer create-project --prefer-dist laravel/laravel tmp"

restart: stop run

clean:
	@docker system prune --volumes --force

test: run
	docker-compose exec php sh -c "vendor/bin/phpunit ./tests/" || (docker-compose down --remove-orphans && exit 1)
	docker-compose down --remove-orphans

test-exec: docker exec php sh -c "vendor/bin/phpunit ./tests/"