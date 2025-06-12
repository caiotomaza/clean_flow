# 🌎 - Clean Flow

Clean Flow é uma aplicação criada para melhor gestão de resíduos sólidos, destinada a empresas do segmento de saneamento básico, mais especificamente resíduos sólidos (ou lixo). Tem como foco realizar uma gestão completa desde a entrada até a saída das estações de tratamento, com registros, dashboards, relatórios e gestão de acessos.

A aplicação principal é web, acessada pelo navegador, e conta também com uma versão mobile para operadores de campo alimentarem o sistema de forma prática e simplificada.

---

## 📌 - Comandos para iniciar

```bash
git clone --single-branch --branch deploy https://github.com/caiotomaza/clean_flow.git
```

```bash
cd clean_flow
```

```bash
docker compose up -d
```

```bash
docker exec -it cleanflow_php bash
```

```bash
composer install
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

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