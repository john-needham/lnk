#!/bin/bash

start() {
    docker-compose start
}

restart() {
    docker-compose restart
}

stop() {
    docker-compose stop
}

composer() {
    arr=("$@")
    docker run --rm --interactive --tty --volume $PWD:/app composer ${arr[@]}
}

artisan() {
    arr=("$@")
    docker exec lnk_php_1 php artisan ${arr[@]}
}

mysql() {
    docker exec -it lnk_mariadb_1 bash
}

exec() {
    container="lnk_$1_1"
    shift
    arr=("$@")
    docker exec $container ${arr[@]}
}

# call function
gagCommand=$1
# remove first elem
shift
gagArgs=( "$@" )
$gagCommand ${gagArgs[@]}
