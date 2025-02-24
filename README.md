
# Product Catalogue API - Documentação

[![NPM](https://img.shields.io/badge/license-MIT-green)](https://github.com/pqmath/product-catalogue-api/blob/main/LICENSE)

<p>
    Uma API para gerenciamento de produtos e categorias,
    desenvolvida com Laravel e Docker, permitindo operações CRUD.
</p>

---

# Como utilizar a API

## Pré-requisitos
- Docker e Docker Compose instalados
- PHP 8+ e Composer (caso precise rodar fora do container)

# Composer 


1. Clone o repositório.
```bash
    git clone https://github.com/pqmath/product-catalogue-api
    cd product-catalogue-api
```

2. Execute os containers com Docker Compose:
```bash
    docker-compose up --build -d
```

3. Acesse o container da aplicação:
```bash
    docker exec -it product_catalogue bash
```
4. Execute as migrações para criar as tabelas no banco de dados:
```bash
    php artisan migrate
```

5. Popule o banco de dados com os produtos e categorias:
```bash
    php artisan db:seed
```

<p>
A API está pronta para ser utilizada, contendo 3 categorias e 3 produtos.
</p>

---

## Endpoints disponíveis

![NPM](https://img.shields.io/badge/GET-green)
![NPM](https://img.shields.io/badge/POST-yellow)
![NPM](https://img.shields.io/badge/PUT-blue)
![NPM](https://img.shields.io/badge/DELETE-red)

---

## Endpoints de categorias

---

### Listar categorias

**Método:** GET  
**localhost:8081** `/categories`

**Resposta:** Retorna a página da lista de categorias

### Adicionar uma categoria nova

**Método:** POST  
**localhost:8081** `/categories`

**Corpo da requisição:**
```json
{
    "nome": "Cadeiras",
    "descricao": "Categoria de Cadeiras"
}
```

**Resposta:** Retorna a página da lista de categorias com uma mensagem confirmando a criação da categoria

### Editar uma categoria existente

**Método:** PUT  
**localhost:8081** `/categories/{id}`

**Corpo da requisição:**
```json
{
    "nome": "Cadeiras de Escritório",
    "descricao": "Categoria de cadeiras confortáveis para escritórios"
}
```

**Resposta:** Retorna a página da lista de categorias com uma mensagem confirmando a edição da categoria

### Deletar uma categoria

**Método:** DELETE  
**localhost:8081** `/categories/{id}`

**Resposta:** Retorna a página da lista de categorias com uma mensagem confirmando a exclusão da categoria

---

## Endpoints de produtos

---

### Listar produtos

**Método:** GET  
**localhost:8081** `/products`

**Resposta:** Retorna a página da lista de produtos

### Cadastrar um produto novo

**Método:** POST  
**localhost:8081** `/products`

**Corpo da requisição:**
```json
{
    "nome": "Cadeira Ronaldinho Gaúcho",
    "descricao": "Cadeira Gamer Ronaldinho Gaúcho",
    "preco": 2000.00,
    "quantidade": 4,
    "category_id": 3
}
```

**Resposta:** Retorna a página da lista de produtos com uma mensagem confirmando a criação do produto

### Editar um produto existente

**Método:** PUT  
**localhost:8081** `/products/{id}`

**Corpo da requisição:**
```json
{
     "nome": "Cadeira Ronaldinho Gaúcho",
     "descricao": "Cadeira Gamer Pichau edição Ronaldinho Gaúcho",
     "preco": 2000.00,
     "quantidade": 1,
     "category_id": 3
}
```
**Resposta:** Retorna a página da lista de produtos com uma mensagem confirmando a edição do produto

### Deletar um produto

**Método:** DELETE  
**localhost:8081** `/products/{id}`

**Resposta:** Retorna a página da lista de produtos com uma mensagem confirmando a exclusão do produto

