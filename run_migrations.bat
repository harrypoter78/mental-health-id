@echo off
cd /d "d:\Documents\Laravel\mental-health-id"
php artisan migrate:fresh --seed
pause
