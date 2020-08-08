<h1>Проект для docker+laravel</h1>
<h2>Используются технологии:</h2>
<ul>
    <li>
        php7.3
    </li>
    <li>
        mysql5.7
    </li>
    <li>
        composer
    </li>
    <li>
        laravel5.8
    </li>
</ul>
<p>Для запуска необходимо создать файл .env в корне проекта и должны быть установлены пакеты:</p>
<ul>
    <li>
        docker 
    </li>
    <li>
        docker-compose
    </li>
</ul>
<p>Команды (находясь в корне проекта):</p>
<ul>
    <li>
        docker-compose build
    </li>
    <li>
        docker-compose up -d
    </li>
    <h3>Или использовать скрипт в папке scripts/build.sh</h3>
</ul>

<p>После сборки необходимо создать ключ проекта и мигрировать таблицы:</p>
<ul>
    <li>
        docker-compose exec -T phpa php artisan key:generate
    </li>
    <li>
        docker-compose exec -T phpa php artisan ide-helper:generate
    </li>
    <li>
        docker-compose exec -T phpa php artisan migrate
    </li>
    <h3>Или использовать скрипт в папке scripts/after.sh</h3>
</ul>