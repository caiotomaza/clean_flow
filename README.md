# 🌎 - Clean Flow

Clean Flow é uma aplicação criada para melhor gestão de resíduos sólidos, destinada a empresas do segmento de saneamento básico, mais especificamente resíduos sólidos (ou lixo). Tem como foco realizar uma gestão completa desde a entrada até a saída das estações de tratamento, com registros, dashboards, relatórios e gestão de acessos.

A aplicação principal é web, acessada pelo navegador, e conta também com uma versão mobile para operadores de campo alimentarem o sistema de forma prática e simplificada.

---

## 📌 - Tecnologias Utilizadas

- **Laravel**
- **PHP**
- **Nginx**
- **MySQL**
- **Redis**
- **phpMyAdmin**
- **Docker Compose**

---

## 🚀 - Como Rodar o Projeto

### 🔧 - Pré-requisitos

Antes de começar, você precisa ter o seguinte instalado na sua máquina:

- [Docker](https://www.docker.com/)

---

### ▶️ - Rodando o Projeto

1. Copie e cole o arquivo `.env.example`, renomeando-o para `.env`

2. Dentro do arquivo `.env`, substitua as variáveis conforme o padrão abaixo:

```env

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=cleanflow
DB_USERNAME=cleanflow
DB_PASSWORD=cleanflow1234

REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PORT=6379

```

3. **Subir os containers do projeto**  
   ```bash
   docker-compose up -d
   ```

4. **Acessar o container do back-end**  
   ```bash
   docker exec -it cleanflow_php bash
   ```

5. **Instalar as dependências do Laravel**  
   ```bash
   composer install
   ```

6. **Gerar a chave do projeto Laravel**  
   ```bash
   php artisan key:generate
   ```

7. **Criar as tabelas no banco de dados**  
   ```bash
   php artisan migrate
   ```

8. **Instalar o Node,js**  
   ```bash
   npm install
   ```

9. **Instalar as dependências do front-end**  
   ```bash
   npm run build
   ```

10. **Compilar os assets do front-end**  
   ```bash
   npm run dev
   ```

### 🎯 Acesse o Projeto  

- **Front-end:** [http://localhost/](http://localhost/)  
- **phpMyAdmin:** [http://localhost:8082](http://localhost:8082)

## ➕ Comandos Úteis  

### 🔄 Limpar o cache e imagens do Docker

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
