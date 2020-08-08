#!/bin/bash

#check for existence .env
FILE_ENV=.env
if [[ ! -f "$FILE_ENV" ]]; then
    cp .env.example .env
fi

#generate key laravel in docker container PHP
docker-compose exec -T phps php artisan key:generate
#generate key ide-helper
docker-compose exec -T phps php artisan ide-helper:generate
#migrate
docker-compose exec -T phps php artisan migrate
