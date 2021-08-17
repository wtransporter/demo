## Recipe web organizer

Simple application for storing recipes:

-   Register
-   Login
-   Create recipe (create, update, delete), upload image
-   Add recipe steps (create, update, delete), upload image
-   Add recipe ingredients (create, update, delete)
-   Define categories (create, update, delete)

## Run project

Download / clone project. Navigate to project folder.</br>
Install composer dependencies (composer install).</br>
Install npm dependencies (npm install).</br>
Create .env file (copy from .env.example).</br>
Generate application key (php artisan key:generate).</br>
Create empty DB and set up .env file with database information.</br>
Run migrations with command:

```
php artisan migrate
```

Seed database:

```
php artisan db:seed
```

Users table contain demo user:</br>
admin@test.com (password 12345678)</br>
Create symlink

```
php artisan storage:link
```

Run server

```
php artisan serve
```
