<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>




## Run project

```
 $ bash ./scripts/build.sh // install package composer and run docker-composer
 $ bash ./scripts/after.sh  //for generate key and migration
```




## Docker


Run project with command
``
    BASH ./build.sh
``


Composer install packages php 
```
docker run --rm --interactive --tty \
  --volume $PWD:/app \
  --user $(id -u):$(id -g) \
  composer install
```






##NEED

Copy .env and set settings
```
cp .env.example .env
```

Generate key laravel
```
docker-compose exec php php artisan key:generate
```

Create migration
```
docker-compose exec php php artisan migrate
```

##PROBLEMS
- permissions


## СОБСТВЕННО ЧТО НАХ*Й ПРОИСХОДИТ

- Сборка докер контейнеров
- Установка зависимостей (пакетов) composer для работы с laravel
- Копирование .env (после надо будет установить значения переменных в этом файле)
- Генерация ключа для laravel
- Создание миграции (надо добавить в общий скрипт или отдельно запускать?)

