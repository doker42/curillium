clone project

set .env file from .env.example

set API_LOCATION_KEY  (https://api.ipgeolocation.io/ipgeo?apiKey=)
set ADMIN_PASSWORD

run commands

composer install
php artisan key:generate
php artisan migrate
php artisan db:seed

