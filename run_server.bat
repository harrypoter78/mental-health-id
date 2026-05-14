@echo off
cd /d "d:\Documents\Laravel\mental-health-id"
echo Memulai Laravel development server...
echo Server akan berjalan di http://localhost:8000
echo Tekan Ctrl+C untuk menghentikan server
php artisan serve --host=0.0.0.0 --port=8000
pause
