# Personal App

Uma aplicação Laravel moderna com Docker, MySQL e suporte a processamento de filas.

## 🚀 Começando

### Pré-requisitos

- Docker
- Docker Compose

### Instalação Rápida

1. **Clone o repositório**
```bash
git clone <seu-repositorio>
cd personal-app
```

2. **Inicie os containers**
```bash
docker compose up -d
```

3. **Execute as migrations**
```bash
docker compose exec app php artisan migrate
```

4. **Acesse a aplicação**
```
http://localhost:8000
```

## 📋 Configuração do Ambiente

O arquivo `.env` é automaticamente configurado com:

```env
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=personal_app
DB_USERNAME=personal_app
DB_PASSWORD=password
```

## 🐳 Serviços Docker

### MySQL 8.0
- **Porta**: 3306
- **Usuário**: personal_app
- **Senha**: password
- **Banco**: personal_app
- **Volume**: Persistente

### Laravel Application
- **Porta**: 8000
- **PHP**: 8.4-FPM
- **Servidor**: Artisan serve

## 📁 Estrutura do Projeto

```
personal-app/
├── app/                 # Código da aplicação
│   ├── Http/           # Controllers e Middlewares
│   │   └── Controllers/
│   └── Models/         # Modelos Eloquent
├── bootstrap/          # Arquivo de inicialização
├── config/             # Configurações
├── database/           # Migrations, Factories e Seeders
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/             # Arquivos públicos
├── resources/          # Views, CSS e JavaScript
│   ├── css/
│   ├── js/
│   └── views/
├── routes/             # Definição de rotas
├── storage/            # Cache, logs e uploads
├── tests/              # Testes unitários e funcionais
├── vendor/             # Dependências (Composer)
├── docker/             # Configuração do MySQL
├── docker-compose.yml  # Orquestração dos containers
├── Dockerfile          # Imagem Docker
└── .env                # Variáveis de ambiente
```

## 🛠 Comandos Úteis

### Gerenciar Containers

```bash
# Iniciar
docker compose up -d

# Parar
docker compose down

# Ver logs
docker compose logs -f app
docker compose logs -f mysql

# Remover volumes (limpar banco de dados)
docker compose down -v

# Rebuild
docker compose up -d --build
```

### Artisan Commands

```bash
# Executar migrations
docker compose exec app php artisan migrate

# Criar migration
docker compose exec app php artisan make:migration <nome>

# Criar model
docker compose exec app php artisan make:model <nome>

# Criar controller
docker compose exec app php artisan make:controller <nome>

# Executar seeders
docker compose exec app php artisan db:seed

# Cache clear
docker compose exec app php artisan cache:clear
docker compose exec app php artisan config:clear
```

### Composer

```bash
# Instalar pacote
docker compose exec app composer require <pacote>

# Remover pacote
docker compose exec app composer remove <pacote>

# Atualizar dependências
docker compose exec app composer update
```

### Database

```bash
# Acessar MySQL
docker compose exec mysql mysql -u personal_app -ppassword personal_app

# Fazer backup
docker compose exec mysql mysqldump -u personal_app -ppassword personal_app > backup.sql

# Restaurar backup
docker compose exec -T mysql mysql -u personal_app -ppassword personal_app < backup.sql
```

## 🧪 Testes

```bash
# Rodar testes com Pest
docker compose exec app ./vendor/bin/pest

# Rodar testes específicos
docker compose exec app ./vendor/bin/pest tests/Feature/ExampleTest.php

# Com coverage
docker compose exec app ./vendor/bin/pest --coverage
```

## 📦 Dependências Principais

- **Laravel 12.x** - Framework PHP
- **PHP 8.4** - Linguagem de programação
- **MySQL 8.0** - Banco de dados
- **Pest** - Framework de testes
- **Composer** - Gerenciador de pacotes PHP

## 🔧 Troubleshooting

### Porta já em uso

Se as portas 3306 ou 8000 estiverem em uso, edite `docker-compose.yml`:

```yaml
ports:
  - "3307:3306"  # Mude para uma porta diferente
  - "8001:8000"  # Mude para uma porta diferente
```

### Erro de permissão

```bash
# Corrigir permissões
docker compose exec app chown -R www-data:www-data /app
docker compose exec app chmod -R 755 /app
```

### Banco de dados não conecta

```bash
# Remover e reconstruir
docker compose down -v
docker compose up -d
docker compose exec app php artisan migrate
```

### Cache de build

```bash
# Limpar cache Docker
docker compose build --no-cache

# Reconstruir sem usar cache
docker compose up -d --build --no-cache
```

## 📚 Recursos

- [Documentação Laravel](https://laravel.com/docs)
- [Docker Docs](https://docs.docker.com)
- [MySQL Docs](https://dev.mysql.com/doc)
- [Pest Documentation](https://pestphp.com)

## 📝 Notas

- O arquivo `.env` contém informações sensíveis - não commit em repositórios públicos
- Os volumes do Docker persistem os dados do banco mesmo após `docker down`
- Use `docker compose logs` para debug
- As migrations são automáticas ao subir os containers

## 🤝 Contribuindo

1. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
2. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
3. Push para a branch (`git push origin feature/AmazingFeature`)
4. Abra um Pull Request

## 📄 Licença

Este projeto está licenciado sob a MIT License - veja o arquivo LICENSE para mais detalhes.

## ✨ Desenvolvedor

Criado com ❤️ por Agostinho Neto

---

**Última atualização**: 2 de Março de 2026
