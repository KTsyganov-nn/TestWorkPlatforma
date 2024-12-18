#!/bin/bash
cd /var/www/public
php artisan queue:work
