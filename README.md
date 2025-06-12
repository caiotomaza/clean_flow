# 🌎 - Clean Flow

Clean Flow é uma aplicação criada para melhor gestão de resíduos sólidos, destinada a empresas do segmento de saneamento básico, mais especificamente resíduos sólidos (ou lixo). Tem como foco realizar uma gestão completa desde a entrada até a saída das estações de tratamento, com registros, dashboards, relatórios e gestão de acessos.

A aplicação principal é web, acessada pelo navegador, e conta também com uma versão mobile para operadores de campo alimentarem o sistema de forma prática e simplificada.

---

## 📌 - Comandos para iniciar

### Clona o repositorio preparado para a hostinger
```bash
git clone --single-branch --branch deploy https://github.com/caiotomaza/clean_flow.git
```

### Entra na pasta do projeto
```bash
cd clean_flow
```

### Sobe os conteiner do docker
```bash
docker compose up -d
```

### Executa o bash no conteiner de back-end
```bash
docker exec -it cleanflow_php bash
```

### Sobe as dependecias do Laravel
```bash
composer install
```

### Gera a Key do Laravel
```bash
php artisan key:generate
```

### Cria o db
```bash
php artisan migrate
```

### Cria as factores e as seeds
```bash
php artisan db:seed
```

### Da a permissão necessaria para o conteiner do back-end
```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

## 🔄 Comandos uteis

### Limpeza de cache
```bash
docker system prune -a
```

### Subir os containers 
```bash
docker-compose up -d
```

### Remover containers
```bash
docker-compose down
```

### Reset do data base
```bash
php artisan migrate:fresh --seed
```

### Executa os teste automaticos
```bash
php artisan test
```

### Excluir a pasta
```bash
rm -R clean_flow
```