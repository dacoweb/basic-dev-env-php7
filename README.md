# PHP7 Dev Environment with Docker Containers

This small project was carried out only for the purpose of being a basic PHP development environment using docker containers.

## Develpment Environment:

* Apache 2.4 (Alpine container: httpd:2.4-alpine)
* Mysql 5.6 (Debian container: mysql:5.6)
* PHP7 with phpfpm (Alpine container: php:7.0-fpm-alpine)
* XDebug for PHP
* Bridge Network between containers

## Requirements

Requirements to run this project:

- [Docker version 18.06.1-ce+](https://github.com/docker/docker-ce)
- [docker-compose version 1.19.0+](https://github.com/docker/compose) 


## Getting Started

Clone this repo into any local directory as normal, then:

Build containers:

```
$ docker-compose build
```

Run containers on detached mode:

```
$ docker-compose up -d
```

The php application is expected to be located on the `src-code` directory.

Open in browser with ip:

http://172.200.0.11/


## Debugging Process (Set to work with Visual Studio Code)

After clone this project, open with VSCODE, set a breackpoint and hit F5. This should be enough start debuging the source code (src-code).

Setting for VSCODE should be located on the .vscode directory, and should look as follow:

```
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9100,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}/src-code/"
            }
        },
    ]
}
```

## Maintainer

* **David Castillo** - *Web Developer* - [dacoweb](https://github.com/dacoweb)
