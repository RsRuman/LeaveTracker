

## Leave Tracker Installation Guide
Please Follow the guideline to set up locally.

- Laravel 11 (php 8.3/8.2)

### Installation process after cloning from git

1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. set database mysql and update related things in .env
5. configure mail in .env (You can use mail trap configuration)
6. php artisan migrate
7. Generate admin by run this command
   - php artisan generate:admin
8. php artisan queue:work
9. php artisan serve
