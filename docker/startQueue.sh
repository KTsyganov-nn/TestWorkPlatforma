#!/bin/bash
cd /var/www/html
php artisan queue:work
