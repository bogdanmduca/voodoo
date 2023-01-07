# voodoo

An example to log random user in laravel log.

# Local deployment

1. Copy the `.env.example` to `.env`
2. Set database credentials for you local database

```
DB_DATABASE=voodoo
DB_USERNAME=root
DB_PASSWORD=
```

3. Run migrations and seed users

```
php artisan migrate:fresh --seed
```

4. Start the workers

```
php artisan queue:work
```

5. Access endpoint to log a random user 1. Mac-
   Use Laravel Valet. Follow the instructions from https://laravel.com/docs/9.x/valet#installation to access locally the application 2. Window
   To be completed

```
http://voodoo.test/api/logged-users
```

6. Access laravel log file at `path_to_project_/storage/logs/laravel.log` and see logged file
    1. If you don't see any user logged it check if the queue workers are up.
