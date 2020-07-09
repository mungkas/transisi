# transisi test

#Bagian 1 : php dasar = php_dasar

#Bagian 2 : php dasar(1) = php_dasar2

#Bagian 3 : php dasar(2) = php_dasar3

#Laravel = fw_laravel
Install all the dependencies using composer

    composer install

Create database for this app, copy the example env file and make the required database configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
Default Email :

    admin@transisi.id 

Password : 

    transisi

