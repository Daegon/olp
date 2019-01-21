OLP
========================

## Up project

Up docker containers
```
cd docker
docker-compose up -d
```

Install dependencies
```
docker-compose exec php bash
composer install
npm install
gulp build
```

Generate database
```
php bin/console doctrine:schema:update
```
