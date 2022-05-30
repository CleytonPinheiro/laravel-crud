# Crud Pedidos

Projeto desenvovendo crud e relacionando as tabelas.

# Ferramentas e versões

Projeto desenvolvido com Laravel [ LARAVEL ](https://github.com/laravel) version 9.x.

Banco de dados rodando em container Docker [ Docker ](https://www.docker.com/) version 20.10

Api Client Open Source [ insomnia ](https://insomnia.rest/) version 2022.3

## Rodando localmente o projeto

Clone o projeto

```bash
  git clone https://github.com/CleytonPinheiro/laravel-crud
```

Entre no diretório do projeto

```bash
  cd laravel-crud
```

Instale as dependências

```bash
  npm install
```

Instale as dependências composer

```bash
  composer install
```

# DOCKER - Subindo banco de dados e PhpMyAdmin

Inicie o banco de dados e PhpMyAdmin

```bash
  docker-compose up
```
# Configurações banco e variáveis de ambiente

DB_DATABASE=produtos
DB_USERNAME=root
DB_PASSWORD=root

# MIGRATES - Criando as tabelas no banco

Criando as tabelas e relacionamentos

```bash
  php artisan migrate
```

Inicie o servidor back end

```bash
  localhost:8000
```

## Servidor desenvolvimento

Na raiz do projeto execute pela linha de comando: php artisan serve e no navegador acesse: localhost:8000

## Importando as requests no Insomnia - Api Client

Baixe o Api em [Download Insomnia](https://insomnia.rest/download)

Na raiz do projeto import o arquivo **insomnia.json** no Api Client.

## Documentação

[Documentação Laravel](https://laravel.com/docs/9.x)

[Documentação Docker](https://docs.docker.com/)

[Documentação Angular](https://angular.io/)

## Stack utilizada

**Front-end:** Angular 13 (Em desenvolvimento)

**Back-end:** Laravel 9.x

**Docker:** Docker 20.10

**Banco de dados:** MySql 8
