create database auto_pecas
default character set utf8mb4
collate utf8mb4_general_ci;

create table clientes(
cpf char (14)not null primary key,
nome char(100)not null,
nascimento date,
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

create table produtos(
codigo_produto int auto_increment primary key,
estoq_produto char (100)not null,
produto char (100)not null, 
data_compra date,
valor_compra decimal(10,2),
quantidade_comprada int not null,
forma_pagamento char(50) not null,
status_compra char(50) not null,
estado_comp char(12)not null
)engine = InnoDB default charset = utf8mb4;

create table compras(
	cpf char (14),
    codigo_venda int,	
	quantidade int,      
    valor decimal(10,2),
    produto char (100), 
    data_compra date,
    forma_pagamento char (100)not null,
    status_compra char (100)not null,
    estado char(50)
)engine = InnoDB default charset =utf8mb4;

describe compras;

alter table compras
add foreign key(cpf)
references  clientes(cpf);

alter table compras
add foreign key(codigo_produto)
references  produtos(codigo_produto);

select * from clientes as compras;
