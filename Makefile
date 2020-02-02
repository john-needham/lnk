build:
	docker-compose build --no-cache
	@make -s clean

run:
	docker-compose up -d --build lnk_nginx lnk_php lnk_composer lnk_db

stop:
	@docker-compose stop

project:
	docker-compose run lnk_composer sh -c "composer create-project --prefer-dist laravel/laravel tmp"

restart: stop run

clean:
	@docker system prune --volumes --force

test: run
	docker-compose exec php sh -c "vendor/bin/phpunit ./tests/" || (docker-compose down --remove-orphans && exit 1)
	docker-compose down --remove-orphans

test-exec: docker exec php sh -c "vendor/bin/phpunit ./tests/"
