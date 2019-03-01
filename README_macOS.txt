
## Install docker


## To run the docker container

Go to the directory where the project is: 

$ docker run -p "80:80" -v ${PWD}:/app mattrayner/lamp:latest-1604-php7

To see the app in the browser: go to http://localhost


## To go to phpMyAdmin

http://localhost/phpmyadmin/




################################ To get into the container. Not needed for this project

## To get the containers that are running

$ docker ps

## To open a shell in that container 

$ docker exec -it 2f4bab724efc /bin/bash

* NOTE: the id of this container is 2f4bab724efc, and it will change every time 

## To connect to mysql as root inside of the container

$ mysql -u root