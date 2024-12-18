<p>
На компьютере должен стоять composer, docker, docker-compose

И быть свободные порты 80, 5173, 3306, 33060, 6379</p>
<p>
После заполнения базы, будет достуен юзер логин 123@mail.ru пароль password
все остальны пользователи заполняются рандомно, пароль password
</p>

<h2>Первый способ запуска через sail.
</h2>
<p>Первая инициализация</p>
    <ol>
    <li>
        в командной строке в папке проекта пишем composer install
    </li>    
    <li>
        переименовываем файл .envSail в .env
    </li>   
    <li>
    пишем команду vendor/bin/sail up -d
    </li>
    <li>Ждем пока соберется проект</li>
    <li>пишем команду docker ps и ищем название контейнера  image файл которого sail-8.4/app (Скорее всего он будет называться testworkplatforma-laravel.test-1)</li>
    <li>пишем команду docker exec -it "Имя контенера из предыдущего шага без кавычек" bash</li>
    <li>пишем команду npm install</li>
    <li>пишем команду npm run build</li>
    <li>пишем команду php artisan migrate:refresh --seed</li>
    <li>пишем команду chmod 777 -R storage</li>
    <li>пишем команду exit</li>
    <li>Приложение доступно по адресу localhost</li>
    <li>для запуска очередей введите команду vendor/bin/sail artisan queue:work</li>
    <li>для выключения приложения введите команду vendor/bin/sail down</li>
</ol>
<p>Следующие запуски</p>
<ol>
    <li>
    пишем команду vendor/bin/sail up -d
    </li>
    <li>Приложение доступно по адресу localhost</li>
    <li>для запуска очередей введите команду vendor/bin/sail artisan queue:work</li>
    <li>для выключения приложения введите команду vendor/bin/sail down</li>

</ol>
<h2>Второй способ запуска через докер</h2>
<p>Первая инициализация</p>
    <ol>
    <li>в командной строке в папке проекта пишем
    docker-compose -f docker-compose.dev.yml up -d</li>    
    <li>Ждем пока соберется проект</li>    
    <li>docker exec -it testWorkPlatforma_app bash /var/www/html/docker/firsInit.sh</li>    
    <li>Для запуска очереди docker exec -it testWorkPlatforma_app bash /var/www/html/docker/startQueue.sh</li>    
    <li>для выключения приложения введите команду docker-compose -f docker-compose.dev.yml down</li>
</ol>
<p>У меня почему-то с первого раза не работает сайт, приходится первую инициализацию проводить 2 раза</p>

<p>Сдедующие запуски </p>
<ol>
    <li>в командной строке в папке проекта пишем
    docker-compose -f docker-compose.dev.yml up -d</li> 
    <li>Для запуска очереди docker exec -it testWorkPlatforma_app bash /var/www/html/docker/startQueue.sh</li>    
    <li>для выключения приложения введите команду docker-compose -f docker-compose.dev.yml down</li>
</ol>
