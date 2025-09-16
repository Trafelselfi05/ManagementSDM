@echo off
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan optimize:clear
php artisan storage:link
start code .
php artisan serve