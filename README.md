## Passo a passo para rodar o projeto
Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="CleanFlow"
APP_URL=http://localhost:80

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3307
DB_DATABASE=clean_flow_db
DB_USERNAME=fl0w_us4r
DB_PASSWORD=Fap$fafa

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec php bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:80](http://localhost:80)