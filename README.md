Trabalho de nivelamento disciplina DEV-1 IFRS Restinga
Desenvolvido em PHP utilizando Microframework MVC

Parte de infraestrutura
    Docker
    - PHP
    - Nginx
    - Composer
Estilo
    - Framework Bootstrap



dado db
**************

docker run -d --name mysql \
 -p 3306:3306 \
 -v /docker/mysql/data:/var/lib/mysql \
 -e MYSQL_ROOT_PASSWORD=root \
 -e MYSQL_DATABASE=leveling_db \
 mysql:5.7

CREATE USER leveling_user@localhost IDENTIFIED BY 'leveling';
GRANT ALL PRIVILEGES ON * . * TO 'leveling_user'@'localhost';
FLUSH PRIVILEGES;

use leveling_db;
create table cliente(
id not null auto_increment primary key,
nome varchar(50) not null
);

create table vendas (
id int not null auto_increment primary key,
produto varchar(50) not null,
preco decimal(10,2) not null,
total decimal(10,2) not null,
cliente_id int not null,
constraint fk_vendas_cliente foreign key(cliente_id)
references cliente(id)
);

