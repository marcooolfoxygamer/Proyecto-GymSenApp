create database bd_gymsenapp;
  use bd_gymsenapp;

create table tipos_usuarios
(
  cod_tipo_user integer not null auto_increment,
  tipo_user varchar(15) not null,
  primary key(cod_tipo_user)
);

create table usuarios
(
  id_user bigint not null,
  fk_tipo_user integer not null,
  nom1_user varchar(20) not null,
  nom2_user varchar(20) null,
  ape1_user varchar(20) not null,
  ape2_user varchar(20) null,
  correo_sena_user varchar(45) not null,
  contrasena varchar(60) not null,
  anteced_salud varchar(255) null,
  primary key (id_user)
);

create table asistencia
(
  id_registro_asis integer not null auto_increment,
  fk_id_instruc bigint not null,
  id_aprend_asis bigint not null,
  nom1_aprend_asis varchar(20) not null,
  nom2_aprend_asis varchar(20) null,
  ape1_aprend_asis varchar(20) not null,
  ape2_aprend_asis varchar(20) null,
  correo_sena_aprend_asis varchar(45) not null,
  fecha_asis date not null,
  primary key (id_registro_asis)
);

create table planificador
(
  id_reg_planif integer not null auto_increment,
  fk_id_aprend bigint not null,
  fk_musculo varchar(15) not null,
  primary key (id_reg_planif)
);

create table musculos
(
  musculo varchar(15) not null,
  primary key (musculo)
);


create table ejercicios
(
  ejercicio varchar(15) not null,
  primary key (ejercicio)
);


create table musculos_ejercicios
(
  pkfk_musculo varchar(15) not null,
  pkfk_ejercicio varchar(15) not null,
  primary key (pkfk_musculo, pkfk_ejercicio)
);


alter table usuarios
add constraint
fk_usuarios_tipos_usuarios
foreign key (fk_tipo_user)
references tipos_usuarios(cod_tipo_user)
on UPDATE cascade
on DELETE cascade;

alter table asistencia
add constraint
fk_asistencia_usuarios
foreign key (fk_id_instruc)
references usuarios(id_user)
on UPDATE cascade
on DELETE cascade;

alter table planificador
add constraint
fk_planificador_usuarios
foreign key (fk_id_aprend)
references usuarios(id_user)
on UPDATE cascade
on DELETE cascade;

alter table planificador
add constraint
fk_planificador_musculos
foreign key (fk_musculo)
references musculos(musculo)
on UPDATE cascade
on DELETE cascade;

alter table musculos_ejercicios
add constraint
pkfk_musculos_ejercicios_musculos
foreign key (pkfk_musculo)
references musculos(musculo)
on UPDATE cascade
on DELETE cascade;

alter table musculos_ejercicios
add constraint
pkfk_musculos_ejercicios_ejercicios
foreign key (pkfk_ejercicio)
references ejercicios(ejercicio)
on UPDATE cascade
on DELETE cascade;


insert into tipos_usuarios (tipo_user) values
("aprendiz"),
("instructor");

insert into usuarios values
(1093498551,1,"Juanito", NULL, "Lopez", "Mesa", "juan391a@soy.sena.edu.co", "", NULL),
(1203984002,1,"Mariana", NULL, "Marin", "Rojas", "mmarin20@soy.sena.edu.co", "202cb962ac59075b964b07152d234b70", "Operacion de rodilla reciente"),
(1039294831,2,"Valentina", "Lizeth", "Rodriguez", "Perez", "valentperez03@soy.sena.edu.co", "250cf8b51c773f3f8dc8b4be867a9a02", NULL),
(1043817344,2,"Maria", "Tatiana", "Cubidez", "Rios", "mari_cub01@soy.sena.edu.co", "", NULL);

insert into asistencia values
(NULL,1039294831,1203984002,"Mariana", NULL, "Marin", "Rojas", "mmarin20@soy.sena.edu.co","2022-10-10"),
(NULL,1039294831,1093498551,"Juanito", NULL, "Lopez", "Mesa", "juan391a@soy.sena.edu.co","2022-10-18"),
(NULL,1043817344,1093498551,"Juanito", NULL, "Lopez", "Mesa", "juan391a@soy.sena.edu.co","2023-02-10"),
(NULL,1039294831,1203984002,"Mariana", NULL, "Marin", "Rojas", "mmarin20@soy.sena.edu.co","2023-02-12"),
(NULL,1039294831,1203984002,"Mariana", NULL, "Marin", "Rojas", "mmarin20@soy.sena.edu.co","2023-02-13");

insert into musculos values ("Pierna"),("Abdomen"),("Brazo");
insert into ejercicios values ("Abdominales"),("Levantar pesas"),("Plancha"),("Leg-press");

insert into musculos_ejercicios values
("Pierna","Leg-press"),
("Abdomen","Plancha"),
("Abdomen","Abdominales"),
("Brazo","Levantar pesas");

insert into planificador values
(NULL,1203984002,"Pierna"),
(NULL,1203984002,"Abdomen"),
(NULL,1093498551,"Pierna"),
(NULL,1093498551,"Pierna"),
(NULL,1093498551,"Brazo");





