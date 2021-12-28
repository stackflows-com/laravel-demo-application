cp .env.dist .env
composer install -n
php artisan key:generate
