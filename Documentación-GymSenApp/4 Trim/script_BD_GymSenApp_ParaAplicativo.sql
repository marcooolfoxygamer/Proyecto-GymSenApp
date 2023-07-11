create database bd_gymsenapp;
use bd_gymsenapp;

create table tipos_usuarios
(
  cod_tipo_user integer not null auto_increment,
  tipo_user varchar(15) not null,
  primary key(cod_tipo_user)
);

create table anteced_salud
(
  antecedente varchar(80) not null,
  primary key(antecedente)
);

create table usuarios
(
  id_user bigint not null,
  fk_tipo_user integer not null,
  nom1_user varchar(30) not null,
  nom2_user varchar(30) null,
  ape1_user varchar(30) not null,
  ape2_user varchar(30) null,
  correo_sena_user varchar(80) not null,
  contrasena varchar(80) not null,
  fk_anteced_salud_sel varchar(80) not null,
  anteced_salud_inp varchar(255) not null,
  estado_user boolean not null,
  primary key (id_user)
);

create table anuncios
(
  id_anunc integer not null auto_increment,
  fk_id_admin_anunc bigint not null,
  titulo_anunc varchar(60) not null,
  desc_anunc varchar(255) not null,
  img_anunc varchar(255) not null,
  estado_anunc boolean not null,
  primary key (id_anunc)
);

create table asistencia
(
  id_registro_asis integer not null auto_increment,
  id_instruc_asis bigint not null,
  fk_id_aprend_asis bigint not null,
  fecha_asis date not null,
  estado_asis boolean not null,
  primary key (id_registro_asis)
);

create table planificador
(
  id_reg_planif integer not null auto_increment,
  fk_id_aprend bigint not null,
  fk_musculo varchar(30) not null,
  primary key (id_reg_planif)
);

create table musculos
(
  musculo varchar(30) not null,
  primary key (musculo)
);

create table ejercicios
(
  ejercicio varchar(30) not null,
  imagen_ejerc varchar(255) not null,
  primary key (ejercicio)
);

create table musculos_ejercicios
(
  pkfk_musculo varchar(30) not null,
  pkfk_ejercicio varchar(30) not null,
  primary key (pkfk_musculo, pkfk_ejercicio)
);


alter table usuarios
add constraint
fk_usuarios_tipos_usuarios
foreign key (fk_tipo_user)
references tipos_usuarios(cod_tipo_user)
on UPDATE cascade
on DELETE cascade;

alter table usuarios
add constraint
fk_usuarios_anteced_salud
foreign key (fk_anteced_salud_sel)
references anteced_salud(antecedente)
on UPDATE cascade
on DELETE cascade;

alter table anuncios
add constraint
fk_anuncios_usuarios_admin
foreign key (fk_id_admin_anunc)
references usuarios(id_user)
on UPDATE cascade
on DELETE cascade;

alter table asistencia
add constraint
fk_asistencia_usuarios_apre
foreign key (fk_id_aprend_asis)
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
("Administrador"),
("Aprendiz"),
("Instructor");

insert into anteced_salud values
("Asma"),
("Artritis"),
("Diabetes"),
("Enfermedad cardiovascular"),
("Enfermedad pulmonar"),
("Enfermedad cronica"),
("Ninguna");

insert into usuarios values
(1,1,"Juanito", NULL, "Lopez", "Mesa", "a@soy.sena.edu.co", MD5("123"),'Asma', '', 1),
(2,2,"Juanito", NULL, "Lopez", "Mesa", "b@soy.sena.edu.co", MD5("123"),'Asma', '', 1),
(3,3,"Juanito", NULL, "Lopez", "Mesa", "c@soy.sena.edu.co", MD5("123"),'Asma', '', 1);

insert into anuncios values
(NULL, 1, "Ten en cuenta", "Por situaciones adversas, el gimnasio no estará disponible en las mañanas hasta nuevo aviso. Pedimos excusas por esta situación. Gracias.", "cinco.jpg",1),
(NULL, 1, "Recuerda...", "Estamos disponibles de 6am a 8pm (sugeto a cambios).", "principal.jpg",1),
(NULL, 1, "Si", "Estamos disponibles de 6am a 8pm (sugeto a cambios).", "cuatro.jpg",1);

insert into musculos values
("Cuadriceps"),
("Triceps"),
("Biceps"),
("Isquiotibiales"),
("Espalda");

insert into ejercicios values
("Leg-press","ej01.png"),
("Extension de pierna", "ej02.png"),
("Copa triceps","ej03.png"),
("Rompecraneos","ej04.png"),
("Curl con mancuernas","ej05.png"),
("Dominadas","ej06.png"),
("Puente isometrico","ej07.png"),
("Curl nordico","ej08.png"),
("Jalon al pecho","ej09.png"),
("Remo brazo","ej10.png");

insert into musculos_ejercicios values
("Cuadriceps","Leg-press"),
("Cuadriceps","Extension de pierna"),
("Triceps","Copa triceps"),
("Triceps","Rompecraneos"),
("Biceps","Curl con mancuernas"),
("Biceps","Dominadas"),
("Isquiotibiales","Puente isometrico"),
("Isquiotibiales","Curl nordico"),
("Espalda","Jalon al pecho"),
("Espalda","Remo brazo");



