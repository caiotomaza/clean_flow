## Passo a passo para rodar o projeto
1. Copie e cole no mesmo local o arquivo ".env.example" e renomeio para ".env";

2. Cole e cole o codigo abaixo no arquivo ".env";
```sh
APP_NAME=CleanFlow
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=America/Sao_Paulo
APP_URL=http://localhost:8080/

APP_LOCALE=pt-BR
APP_FALLBACK_LOCALE=pt-BR
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=clean_flow_db
DB_USERNAME=pi
DB_PASSWORD=pi

SESSION_DRIVER=redis
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

3. Suba os containers do projeto;
```sh
docker-compose up -d
```

4. Acesse o container do back-end para rodar as dependencias;
```sh
docker-compose exec back-end bash
```

5. Instale as dependências do projeto;
```sh
composer install
```

6. Gere a key do projeto Laravel;
```sh
php artisan key:generate
```

Acesse o projeto
[http://localhost:8080/](http://localhost:8080/)