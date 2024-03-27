create database auto_pecas
default character set utf8mb4
collate utf8mb4_general_ci;

create table clientes(
cpf char (14)not null primary key,
nome_cliente char(100)not null,
data_nascimento date,
telefone char (15),
email char(100),
sexo char(9) not null,
cep char (10)not null,
rua char(100),
numero char (15),
bairro char(25)not null,
cidade char (100),
estado char(25)not null
)engine = InnoDB default charset = utf8mb4;

insert into clientes(cpf,nome_cliente,data_nascimento,telefone,email,sexo,cep,rua,numero,bairro,
cidade,estado)
values('00899320210','Wanderson nascimento','2024-03-27','3185299894','email@gmaim.com',
'M','22926318','Das Mangueiras','18','Capim Verde','Belo Horizonte','MG');

describe clientes;

create table produtos(
codigo_produto int auto_increment primary key,
estoq_produto char (100)not null,
produto char (100)not null, 
data_compra date,
valor_compra decimal(10,2),
quantidade_comprada int not null,
estoque int not null,
estado_comp char(12)not null
)engine = InnoDB default charset = utf8mb4;

insert into produtos(estoq_produto,produto,data_compra, valor_compra,quantidade_comprada,estoque,
estado_comp)
values('50','Oleo Mobil', '2024-03-20', '150','5','10','RJ');

create table compras(
	cpf char (14),
    codigo_produto int,	
	codigo int auto_increment primary key,    
    quantidade int,      
    valor_unitario decimal(10,2),
    desconto int not null,
    data_compra date,
    garantia int,
    forma_pagamento char (100)not null,
    status_compra char (100)not null
)engine = InnoDB default charset =utf8mb4;

insert into compras(quantidade, valor_unitario, desconto, data_compra, garantia, forma_pagamento,
status_compra)values('5','40','5','2024-03-21', '30','dinheiro','finalizada');


describe compras;

alter table compras
add foreign key(cpf)
references  clientes(cpf);

alter table compras
add foreign key(codigo_produto)
references  produtos(codigo_produto);

select * from clientes as compras;