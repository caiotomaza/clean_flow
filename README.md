# 🌎 - Clean Flow

Clean Flow é uma aplicação criada para melhor gestão de resíduos sólidos, destinando-se a empresa do seguimento de saneamento básico, mais especificamente resíduos sólidos (ou lixo). Tendo como foco realizar uma gestão completa desdá entrada até a saída das estações de tratamento de resíduos, com vários sistemas de registros e tecnologias de otimização tendo como principal aplicação para gestão, na  web, onde você acessa pelo navegador as principais funções para administração dos dados coletados com dashboard, relatórios, gestão de acessos e muitos mais, além do mais teremos uma versão mobile em os operadores de campo poderão alimentar o sistema de forma prática e simplificada.

## 📌 - Tecnologias Utilizadas
- **Laravel v12.0.3**;
- **PHP v8.2.27**;
- **Nginx v1.27.4-alpine**;
- **Mysql v8.0**;
- **Redis vlatest-alpine**;
- **PHP Myadmin:5.2.2**;
- **Docker v3.8**.

## 🚀 - Como Rodar o Projeto

### 🔧 - Pré-requisitos
Antes de começar, instale os seguintes programas na sua máquina:
- [Docker](https://www.docker.com/).

### ▶️ - Rodando o Projeto
1. Copie e cole no mesmo local o arquivo ".env.example" e renomeio para ".env";

2. Cole e cole o codigo abaixo no arquivo ".env";
```sh
APP_NAME=Clean_flow
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=pt-BR
APP_FALLBACK_LOCALE=en
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
DB_HOST=mysql_clean_flow
DB_PORT=3306
DB_DATABASE=clean_flow
DB_USERNAME=clean_flow
DB_PASSWORD=clean_flow1234

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=redis_clean_flow
REDIS_PASSWORD=null
REDIS_PORT=6380

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
docker exec -it app bash
```

5. Instale as dependências do projeto;
```sh
composer install
```

6. Gere a key do projeto Laravel;
```sh
php artisan key:generate
```

7. Crie as migrations;
```sh
php artisan migrate
```

### ➕ - Extras
- Limpar o cache e imagens do docker;
```sh
docker system prune -a
```

Acesse o projeto em [http://localhost/](http://localhost/)
- **phpMyAdmin:** [http://localhost:8083](http://localhost:8083)
