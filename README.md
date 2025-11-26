Categorias (Laravel & Docker)

Este projeto implementa um backend CRUD (Create, Read, Update, Delete) de Categorias utilizando Laravel e um ambiente de desenvolvimento isolado com Docker.

Tecnologias Chave

* Backend: Laravel (PHP 8.2+)
* Banco de Dados: MySQL 8.0
* Contêineres: Docker e Docker Compose
* Servidor Web: Nginx

---

Estrutura do Repositório

A estrutura é organizada para separar as configurações do Docker do código da aplicação (`P1Laravel`):

Arquivo/Pasta : Função 

docker-compose.yml : Define e orquestra os serviços (db, app, nginx).
Dockerfile : Imagem do PHP-FPM que instala o Composer. 
docker/nginx/default.conf : Configuração do Nginx. 
P1Laravel/ : CÓDIGO LARAVEL COMPLETO (Inclui Controller, Model, Rotas, Views). 
P1Laravel/database/migrations : Criação da tabela categories (nome, descricao, timestamps). 

---

Instruções de Execução

Pré-requisitos

Certifique-se de ter o Docker e o Docker Compose instalados.

1. Iniciar o Ambiente

Na raiz do projeto (onde está o docker-compose.yml), inicie e construa as imagens:

```bash
docker-compose up -d --build
```

2. Configurar o Projeto
   
Acesse o contêiner da aplicação (laravel_app) para instalar as dependências e o banco de dados.

```bash
# 1. Instalar dependências PHP e gerar chave de segurança (APP_KEY)
docker exec laravel_app composer install
docker exec laravel_app php artisan key:generate

# 2. Criar as tabelas no MySQL
docker exec laravel_app php artisan migrate
```

3. Acessar o CRUD
A aplicação estará disponível através do Nginx na porta 8080.

Acesse no navegador:
```bash
http://localhost:8080/categories
```


IMAGENS DO PROJETO FUNCIONANDO

Tela listagem
<img width="1907" height="972" alt="1" src="https://github.com/user-attachments/assets/bc97c5d1-274e-485c-8c1d-bbbf14599457" />

Tela Criar Nova Categoria
<img width="1918" height="976" alt="2" src="https://github.com/user-attachments/assets/7534c52e-dfca-4a1b-b242-61dc565f47d0" />

Tela Categoria Criada
<img width="1916" height="976" alt="3" src="https://github.com/user-attachments/assets/3ac32192-8f15-457d-a853-83f3b55b388c" />

Tela Editar Categoria
<img width="1912" height="968" alt="4" src="https://github.com/user-attachments/assets/13a45ac4-52fa-40a1-a18f-53904026d117" />

Tela Categoria Editada
<img width="1912" height="967" alt="5" src="https://github.com/user-attachments/assets/08a07d2f-05d0-4689-93b9-e288d62c553a" />

Tela Categoria Excluida
<img width="1917" height="972" alt="6" src="https://github.com/user-attachments/assets/45deecf6-428f-4e01-8594-557a4427933c" />
