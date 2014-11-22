# README-setup

## Requirements

* LAMP
* Git
* Composer
* Node + NPM (for Bower)
* Bower


Setup Symfony (ie. Symfony website).

## Setup Cache and Log

```sh
$ sudo rm -rf app/cache/*
$ sudo rm -rf app/logs/*
$ mkdir web/uploads/documents

$ HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs web/uploads/documents
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs web/uploads/documents
```

## Setup .dist file

```sh
$ cp app/config/parameters.yml.dist app/config/parameters.yml
$ cp app/config/config-web/.htaccess web/
$ cp app/config/config-web/app.php web/
$ cp app/config/config-web/app_dev.php web/
$ cp app/config/config-web/robots.txt web/robots.txt
```

Update 'parameters.yml'.

## Vendors PHP (composer)

```sh
$ composer install
```

## Vendro JS (bower)

```sh
$ bower install
```

## Setup DB

```
[mysqld]
collation-server = utf8_general_ci
character-set-server = utf8
```
mySQL config

```sh
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:create
# $ php app/console doctrine:fixtures:load
```

## Install Assets

```sh
$ php app/console assets:install --symlink
$ php app/console assetic:dump --env=prod --no-debug
```

## Write access to the /uploads/documents folder

```sh
$ chmod 777 web/uploads/documents
```

