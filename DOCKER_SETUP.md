# Docker Setup - Personal App

## Instruções para Rodar com Docker Compose

### Pré-requisitos
- Docker e Docker Compose instalados

### Passos para iniciar

1. **Atualize o arquivo .env com as credenciais do banco de dados do Docker:**

```bash
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=personal_app
DB_USERNAME=personal_app
DB_PASSWORD=password
```

2. **Inicie os containers:**

```bash
docker-compose up -d
```

3. **Execute as migrations do Laravel:**

```bash
docker-compose exec app php artisan migrate
```
4. **Inicie o servidor Vite (JS/CSS)**

Enquanto o container `app` já serve Laravel, há um novo serviço `node` que roda o `npm run dev`. Basta subir o compose e ele fará `npm install` e iniciará o Vite automaticamente:

```bash
docker-compose up -d
```

Se precisar atras:

```bash
docker-compose up -d node
```4. **Acesse a aplicação:**

A aplicação estará disponível em `http://localhost:8000`

### Comandos Úteis

**Ver logs:**
```bash
docker-compose logs -f app
docker-compose logs -f mysql
docker-compose logs -f node
```

**Ver status de Node/Vite:**
```bash
docker-compose ps
```
**Parar os containers:**
```bash
docker-compose down
```

**Remover volumes (banco de dados):**
```bash
docker-compose down -v
```

**Acessar o MySQL:**
```bash
docker-compose exec mysql mysql -u personal_app -ppassword personal_app
```

**Executar artisan commands:**
```bash
docker-compose exec app php artisan <comando>
```

**Instalar pacotes Composer:**
```bash
docker-compose exec app composer require <pacote>
```

### Estrutura dos Serviços

- **mysql**: MySQL 8.0 (porta 3306)
- **app**: Laravel application (porta 8000)

O banco de dados é armazenado em um volume Docker chamado `mysql_data` para persistência de dados.

### Troubleshooting

**Erro de conexão com banco:**
```bash
docker-compose down -v
docker-compose up -d
```

**Porta já em uso:**
Edite o `docker-compose.yml` e altere as portas (ex: "3307:3306")

**Migrations não rodaram automaticamente:**
```bash
docker-compose exec app php artisan migrate
```
