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
    docker exec lnk_php php artisan ${arr[@]}
}

mysql() {
    docker exec -it lnk_db bash
}

exec() {
    container="lnk_$1"
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
