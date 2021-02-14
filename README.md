# Parca - Sistema de pedido de viaturas

Sistema concebido em trabalho conjunto com a 12ª RM, em Manaus, em 2019, com a finalidade de conectar e facilitar pedido de transporte.

Nome Parca: Web app para gestão da garagem e de viatuas.

Descrição: I sistema foi concebido pela 12ªrm, como uma forma de plataforma para automatizar a gestão de viaturas para missões externas e internas melhorando o atendimento com os solicitantes onde era feito por telefone os pedidos levanto em torno de 1 a 2 dias para poder liberar alguma viatura, com o sistema teve uma automatização da forma de gerri os pedidos o usuário solicita seu pedido em segundos o pedido já estar nas mãos da garagem que cuida da gestão das viaturas, o sistema cadastra todas as viaturas gerando estatistica das baixadas e as que estão prontos para missão, gestão de motoristas e suas categorias e relatorios

Sistema feito em PHP usando framework Laravel, Bootstrap, Jquery, usando o banco de dados MySQL

### Instalation in 5 steps
```bash
git clone https://github.com/tthiagopereira/parca-sistema-pedido-viatura.git
cd parca
composer install
cp .env.example .env
php artisan key:generate
```

- You have to register and login to app (database needed)
- If you are user MySQL you can paste this to your .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=parca
DB_USERNAME=root
DB_PASSWORD=root
```

- To create table in database
```bash
	php artisan migrate
```
(or to create table with exemplary user 'John Doe')
```bash
	php artisan migrate:fresh --seed
``` 



##### That's all. Enjoy.

### Change log
##### v 1.0.6a
##### v 1.0.6
- Update Parca 1.0.6