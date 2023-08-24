#!/bin/bash

# set -x
cd `dirname $0`
[ -f .env ] || cp .env.example .env
# [ -f config.php ] || cp config.sample.php config.php

source .env &> /dev/null || exit
app=${APP_NAME}-php
_APP_NAME="\e[32m${APP_NAME}\e[00m"   # project name in color

# Check Docker service
printf "Checking docker service status ... "
if ! docker info &> /dev/null ; then 
    echo "Error: docker service is not running. Please start Docker."
    exit
fi
echo done

# stop command
if [ "$1" = "stop" ] ; then
    echo "Stopping docker ..."
    docker-compose stop
    echo "Stopping docker ... done"
    exit
fi

# build command
if [ "$1" = "build" ] ; then
    echo "Building containers ..."
    docker-compose build
    echo "Building containers ... done"
    exit
fi

# check if docker is already up
if docker-compose ps | grep "$app.*Up" &> /dev/null  ; then
    echo -e "project $_APP_NAME already started"
    docker-compose ps
    exit
fi

_exit(){
    docker-compose stop
    exit
}

echo "docker-compose up -d ..."
docker-compose up -d || exit

setup(){
    echo "Setting up project ..."
}

# run initial setup
if [ "$1" = "setup" ] ; then
    setup
fi

if [ "$SERVER_ENV" = "dev" ] ; then
    echo -e "$_APP_NAME project started!"
else
    # attach to containers
    docker-compose up
fi
