create database casamentodossonhos;
  -- drop database casamentodossonhos;
use casamentodossonhos;
/*
create table tipo_usuario(
desc_tipo_usu text,
cod_status_usu char(2),
cod_tipo_usu int primary key auto_increment
);
*/

create table usuario(
cod_usu int primary key auto_increment, 
nome_usu varchar(60),
tipo_usu varchar(60),
email_usu varchar(60),
senha_usu varchar(60),
nascimento_usu varchar(60),
cep_usu varchar(60),
rua_usu varchar(60),
bairro_usu varchar(60),
cidade_usu varchar(60),
estado_usu varchar(60),
foto_usu varchar(60),
nome_par_usu varchar(60),
tipo_par_usu varchar(60),
nascimento_par_usu varchar(60),
data_casal varchar(60),
horario_casal varchar(20),
local_casal varchar(60),
foto_local varchar(60)
);
-- select * from usuario;
/*
create table email(
titulo_email varchar(100),
data_hora_email datetime,
espaço_email varchar(80),
cod_status_email char(2),
cod_email int primary key auto_increment
);
*/

create table empresa(
cod_empresa int primary key auto_increment,
nome_empre varchar(100),
cnpj_empre varchar(60),
email_empre varchar(100),
senha_empre varchar(60),
cep_empre varchar(60),
rua_empre varchar(60),
bairro_empre varchar(60),
cidade_empre varchar(60),
estado_empre varchar(60),
foto_empre varchar(60),
tel_empre varchar(50),
categoria_empre varchar(60)
);

create table categoria(
cod_categoria int primary key auto_increment,
nome_categoria varchar(100),
desc_categoria text,
-- senha_empresa varchar(100), NÃO ENTENDI --
url_foto_categoria varchar(100),
-- cep varchar(50), --
 cod_status char(1)
);

create table produto(
cod_produto int primary key auto_increment,
nome_prod varchar(100),
preco_prod varchar(100),
desc_prod text,
url_foto_prod varchar(100),
local_prod varchar(199),
cod_empresa int,
cod_categoria int,
foreign key(cod_empresa)references empresa(cod_empresa),
foreign key(cod_categoria)references categoria(cod_categoria)
);

create table convidados(
 cod_conv int primary key auto_increment,
 email_conv varchar(80),
 num_acomp varchar(80),
 nome_convi char(80),
 presenca char(30),
 celular_conv varchar(15),
 cod_usu int,
 foreign key(cod_usu) references usuario(cod_usu)
);

-- insert into convidados(email_conv, num_acomp, nome_convi, presenca, celular_conv, cod_usu) values ('xd@', '2', 'xupinga', 'vo nada', '40028922'); 

create table lista_presentes(
cod_list_pres int primary key auto_increment,
nome_valor_presente varchar(40),
tipo_presente varchar(50),
cod_conv int,
cod_usu int not null,
foreign key(cod_conv)references convidados(cod_conv),
foreign key(cod_usu) references usuario(cod_usu)
);
-- drop table lista_presentes;
/*INSERT INTO LISTA_PRESENTES(nome_valor_presente, tipo_presente, cod_usu) values($nomePres, $tipoPres, $id);
select * from lista_presentes where cod_usu = 4;
DELETE FROM LISTA_PRESENTES WHERE NOME_VALOR_PRESENTE = 'Foguete' AND COD_USU = '4';
select* from lista_presentes;*/
/*
create table comentario(
cod_coment int primary key auto_increment,
data_hora_coment varchar(20),
cod_status_coment char(2),
desc_coment varchar(100)
);
*/

create table favorita(
cod_status_favorita char(2),
cod_favorita int auto_increment,
cod_produto int,
cod_usu int,
foreign key(cod_usu) references usuario(cod_usu),
primary key(cod_favorita, cod_produto, cod_usu)
);

create table adm(
cod_adm int primary key auto_increment,
nome_adm varchar(100),
email_adm varchar(100),
senha_adm varchar(60)
);
/*INSERT INTO usuario(nome_usu, tipo_usu, email_usu, senha_usu, 
                nascimento_usu, cep_usu,  rua_usu, bairro_usu, cidade_usu, estado_usu, foto_usu, nome_par_usu,  
                tipo_par_usu, nascimento_par_usu, data_casal) 
values("gustavo", "tipodanado", "gusta@gg.com", "gusta", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1");
select * from usuario;
UPDATE USUARIO SET FOTO_USU = '$novoNome.$extensao' where email_usu = 'gusta@gg.com';*/
/*SELECT p.nome_prod, p.preco_prod, p.desc_prod, 
	   p.local_prod, c.nome_categoria, c.desc_categoria,
	   e.nome_empre
	   FROM PRODUTO p
	   INNER JOIN CATEGORIA c
	   ON p.cod_categoria = c.cod_categoria 
	   INNER JOIN EMPRESA e
	   ON e.cod_empresa = e.cod_empresa
	   where nome_prod like '%n%';
       select * from produto;*/
       
       insert into categoria(nome_categoria, desc_categoria, cod_status) values ('Flores', 'Flores em Geral', 'A');
      