.PHONY: setup, test, migrate, tinker, reseed
setup:
	 docker-compose exec php composer install
	 docker-compose exec php ./artisan key:generate
	 docker-compose exec php ./artisan migrate --step --seed

migrate:
	docker-compose exec php php artisan migrate --step

test:
	docker-compose exec php php artisan test

tinker:
	docker-compose exec php php artisan tinker

reseed:
	docker-compose exec php ./artisan migrate:fresh  --step --seed
