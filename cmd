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
    docker run --rm --interactive --tty --volume $PWD:/app __PROJECT___composer ${arr[@]}
}

artisan() {
    arr=("$@")
    docker exec __PROJECT___php_1 php artisan ${arr[@]}
}

mysql() {
    docker exec -it __PROJECT___mariadb_1 bash
}

exec() {
    container="__PROJECT___$1_1"
    shift
    arr=("$@")
    docker exec $container ${arr[@]}
}

# call function
cmdCommand=$1
# remove first elem
shift
cmdArgs=( "$@" )
$cmdCommand ${cmdArgs[@]}
