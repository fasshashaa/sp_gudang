@echo off
REM =================================================================
REM JANGAN LUPA GANTI PATH INI dengan folder proyek Laravel Anda
cd /d "C:\laragon\www\ManunggalGudang"
REM =================================================================

REM Perintah 'start' membuka jendela CMD baru.
REM '/k' menjaga jendela tetap terbuka setelah perintah dijalankan.
start "Laravel Serve" cmd /k "php artisan serve"

REM 'exit' akan menutup jendela CMD awal yang menjalankan script ini.
exit