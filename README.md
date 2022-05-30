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

## Documentação da API - Rotas

#### Retorna todos os Produtos

```http
  GET localhost:8000/api/produtos
```

#### Retorna todos os Pedidos

```http
  GET localhost:8000/api/pedidos
```

#### Retorna todos os clientes

```http
  GET localhost:8000/api/clientes
```

#### Retorna um produto

```http
  GET localhost:8000/api/produto/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### Retorna um pedido

```http
  GET localhost:8000/api/pedido/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |


#### Retorna um cliente com seu respectivo pedido

```http
  GET localhost:8000/api/produto/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |


#### Deleta um pedido

```http
  DEL localhost:8000/api/pedidos/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### Deleta um produto

```http
  DEL localhost:8000/api/produto/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### Deleta um pedido

```http
  DEL localhost:8000/api/pedidos/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |

#### Deleta um cliente

```http
  DEL localhost:8000/api/clientes/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer |


#### Cadastra um cliente

```http
  POST localhost:8000/api/clientes
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | `string` | **Obrigatório**. O ID do item que você quer |
| `surname`      | `string` | **Obrigatório**. O ID do item que você quer |
| `birth_date`      | `date` | **Obrigatório**. O ID do item que você quer |
| `cpf`      | `number` | **Obrigatório**. O ID do item que você quer |
| `pedidos_compras_id`      | `number` | **Obrigatório**. O ID do pedido |


#### Cadastra um pedido

```http
  POST localhost:8000/api/pedidos
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `status`      | `string` | **Obrigatório**. ABERTO, PAGO OU CANCELADO |
| `total_geral`      | `number` | **Obrigatório**.Valor total do pedido |

#### Cadastra um produto

```http
  POST localhost:8000/api/produtos
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `product`      | `string` | **Obrigatório**. Produto a ser cadastrado |
| `amount`      | `number` | **Obrigatório**.Quantidade do produto. |
| `category`      | `string` | **Obrigatório**. Categoria do produto |
| `value_unit`      | `number` | **Obrigatório**.Valor total do produto |
| `pedidos_compras_id`      | `string` | **Obrigatório**.Pedido que o produto pertence |


## Documentação

[Documentação Laravel](https://laravel.com/docs/9.x)

[Documentação Docker](https://docs.docker.com/)

[Documentação Angular](https://angular.io/)

## Stack utilizada

**Front-end:** Angular 13 (Em desenvolvimento)

**Back-end:** Laravel 9.x

**Docker:** Docker 20.10

**Banco de dados:** MySql 8
