# RestaurantList
Laravel Api and NextJS

#NextJS

cd frontend-next

npm install

npm run dev


#Laravel Api

cd backend
composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed --class=RestaurantSeeder
