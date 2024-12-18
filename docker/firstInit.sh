#!/bin/bash
if [ -f "/var/www/public/node_modules" ]; then
    rm -rf /var/www/public/node_modules
fi
cd /var/www/public
cp /var/www/public/.envtestBuild /var/www/public/.env
composer update
npm install
npm run build
php atrisan migrate:refresh --seed
chmod 777 -R ./storage
echo "Все скрипты выполнены!"
