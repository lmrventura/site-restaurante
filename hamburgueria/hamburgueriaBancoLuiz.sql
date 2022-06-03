create database hamburgueria;

use hamburgueria;

create table funcionario(
	id int not null auto_increment,
	nome varchar(100) not null,
	login varchar(50) not null,
	senha varchar(50) not null,
	email varchar(200) not null unique,
	primary key(id)
);

create table cliente(
	id int not null auto_increment,
	nome varchar(100) not null,
	telefone long null,
	primary key(id)
);

create table produto(
	id int not null auto_increment,
	nome varchar(100) not null,
	quantidade int not null,
	valor numeric(9,2) not null,
	primary key(id)
);

create table venda(
	id int not null auto_increment,
	id_cliente int not null,
	id_func int not null,
	id_produto int not null,
	data date not null,
	quantidade int not null,
	primary key(id)
);
/*
constraint fk_venda_cliente foreign key (id_cliente) references cliente(id),
constraint fk_venda_func foreign key (id_func) references funcionario(id),
constraint fk_venda_produto foreign key (id_produto) references produto(id)
*/
insert into funcionario
values(0, 'Anildo', 'anildo', '1234','matosAnildo@hotmail.com');

insert into funcionario
values(0, 'Luiz', 'luiz', '1234','venturaLuiz@hotmail.com');

select * from funcionario f

insert into cliente
values(0, 'Fernanda', '7198887766');

insert into cliente
values(0, 'Michael', '71998765322');

select * from cliente c;

insert into produto(id, nome, quantidade, valor)
values (0, 'CheeseBurger', 10, 20.00);

insert into produto(id, nome, quantidade, valor)
values (0, 'Mcmelt', 10, 21.00);

select * from produto p;

insert into venda(id, id_cliente, id_func, id_produto, data, quantidade)
values(0, 1, 1, 1, '2022-02-02', 2);

insert into venda(id, id_cliente, id_func, id_produto, data, quantidade)
values(0, 2, 2, 2, '2022-02-02', 2);

select * from venda v;

select v.data, v.quantidade, c.nome as 'Cliente', p.nome as 'Produto', p.valor, f.nome as 'Funcionario', (p.valor * v.quantidade) as 'Total'
from venda v