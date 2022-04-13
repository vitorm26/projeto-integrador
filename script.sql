# chamar o SGBD
mysql -u root
#criar base
create database cervejaphp;

use cervejaphp;

create table usuario(
    idusuario int auto_increment primary key,
    nome varchar(50) unique,
    email varchar(50) unique,
    senha varchar(50),
    perfil varchar(50),
    cep int,
    rua varchar(50),    
    bairro varchar(20),
    cidade varchar(20),
    uf varchar(4),
    ibge int    
);
#inserir dados na tabela

insert into usuario values(null, 'vitin','vitin@vitin',md5('123'),'adm','21210675','avenida brasil','sepetiba','tao, tao distante','RJ','220144');
 insert into usuario values(null, 'vitao','vitao@vitao',md5('123'),'user','21210720','engenheiro','peinha','babaquice e o tempo todo','RJ','330033');


 select * from usuario;

create table cervejas(
    idproduto int auto_increment primary key,
    nome varchar(20),
    nota int,
    tipo varchar(20),
    pais varchar(20),
    comentario varchar(50),
    cep int,
    rua varchar(50),
    bairro varchar(20),
    cidade varchar(20),
    uf varchar(4),
    ibge int
);
    insert into cervejas values(null, 'Brahma','5','Pilsen','Brasil','a melhor','21210-675','Rua zé','tijuca','uberlandia','MG','303142');
    insert into cervejas values(null, 'Antarctica','3','Pilsen','Brasil','boa','21210-675','Rua zé','tijuca','uberlandia','MG','303142');
    insert into cervejas values(null, 'Budweiser','4','American Lager','EUA','razoavel','21210-675','Rua zé','tijuca','uberlandia','MG','303142');
    insert into cervejas values(null, 'Amstel','3','Lager','Holanda','boa','21210-675','Rua zé','tijuca','uberlandia','MG','303142');
    insert into cervejas values(null, 'Heineken','5','American Premium Lager','Holanda','muito boa','21210-675','Rua zé','tijuca','uberlandia','MG','303142');
    insert into cervejas values(null, 'Becks','5','German Lager','Alemanha','muito boa','21210-675','Rua zé','tijuca','uberlandia','MG','303142');

select * from cervejas;