#!/bin/bash
if [ -f "/var/www/html/node_modules" ]; then
    rm -rf /var/www/html/node_modules
fi
cd /var/www/html
cp /var/www/html/.envtestBuild /var/www/html/.env
composer update
npm install
npm run build
php artisan migrate:refresh --seed
chmod 777 -R ./storage
echo "Все скрипты выполнены!"
