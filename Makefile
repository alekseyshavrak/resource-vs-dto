laravel_container = docker compose exec laravel

setup:
	@make up
	@${laravel_container} composer install
	@${laravel_container} php artisan migrate:fresh --seed

up:
	docker-compose up -d --build

down:
	docker-compose down --remove-orphans

db-migrate:
	@${laravel_container} php artisan migrate

db-rollback:
	@${laravel_container} php artisan rollback
