# Projeto Base - Programa Eficiência

Este repositório contém o código-fonte de um projeto base Laravel. O projeto foi desenvolvido pelo grupo Eficiência.

## Pré-requisitos

Antes de começar, verifique se você possui o Docker instalado em sua máquina.

## Configuração do Ambiente Docker

1. Clone este repositório em sua máquina usando o seguinte comando:
```bash
git clone https://github.com/holding-eficiencia/projeto-base.git
```
2. Entre no repositorio clonado
```bash
cd projeto-base/
```
3. Crie o arquivo .env
```bash
cp .env.example .env
```
4. No diretório raiz do projeto, execute o seguinte comando para instalar as dependências:
```bash
docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v "$(pwd):/var/www/html" \
  -w /var/www/html \
  laravelsail/php82-composer:latest \
  composer install --ignore-platform-reqs
``` 
5. Configurar o alias do Sail
```bash
sudo nano .bashrc
```
Adicionar essa linha ao arquivo e salve:
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

```
6. Inicialize os containers
```bash
sail up -d
```
7. Gere a chave de criptografia do Laravel:
```bash
sail php artisan key:generate
```
8.   Crie um link simbólico para o armazenamento público:
```bash
sail php artisan storage:link
```
9.   Instale as dependências do NPM:
```bash
sail npm install
```
10.   Compile os assets:
```bash
sail npm run build
```
11.   Execute a aplicação Laravel Sail:
```bash
sail npm run dev
```

12. No terminal execute a seeder para criar primeiro usuário com perfil Super Admin
```bash
sail php artisan db:seed --class=DatabaseSeeder
```
13. Acesse o dashboard padrão do sbadmin2 através do link: http://localhost

14. Acesso o banco de dados atraves do link: http://localhost:8080/ , com as credenciais:
    1.  DB_HOST=mysql
    2.  DB_USERNAME=sail
    3.  DB_PASSWORD=password
