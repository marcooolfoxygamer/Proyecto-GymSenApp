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
("administrador"),
("aprendiz"),
("instructor");

insert into anteced_salud values
("Asma"),
("Artritis"),
("Diabetes"),
("Enfermedad cardiovascular"),
("Enfermedad pulmonar"),
("Enfermedad cronica"),
("Ninguna");

insert into usuarios values
(1093498551,2,"Juanito", NULL, "Lopez", "Mesa", "juan391a@soy.sena.edu.co", "123",'Asma', '', 1),
(1203984002,2,"Mariana", NULL, "Marin", "Rojas", "mmarin20@soy.sena.edu.co", "456",'Ninguna', "Operacion de rodilla reciente", 1),
(1039294831,3,"Valentina", "Lizeth", "Rodriguez", "Perez", "valentperez03@soy.sena.edu.co", "456", 'Enfermedad cronica','', 1),
(1039387284,2,"Lucas", NULL, "Sanchez", "Lopez", "lopluc_22@soy.sena.edu.co", "abc123", 'Ninguna', '', 0),
(1034938112,3,"Stefany", "Alexandra", "Moreno", "Hernandez", "stefmhern@soy.sena.edu.co", "s11", 'Diabetes', "Factura de codo", 1),
(1043817344,3,"Maria", "Tatiana", "Cubidez", "Rios", "mari_cub01@soy.sena.edu.co", "789", 'Ninguna', '', 0);

insert into anuncios values
(NULL, 1, "Ten en cuenta", "Por situaciones adversas, el gimnasio no estará disponible en las mañanas hasta nuevo aviso. Pedimos excusas por esta situación. Gracias.", "cinco.jpg",1),
(NULL, 1, "Recuerda...", "Estamos disponibles de 6am a 8pm (sugeto a cambios).", "principal.jpg",1),
(NULL, 1, "Si", "Estamos disponibles de 6am a 8pm (sugeto a cambios).", "cuatro.jpg",1);

insert into asistencia values
(NULL,1039294831,1203984002,"2022-10-10", 1),
(NULL,1039294831,1093498551,"2022-10-18", 0),
(NULL,1043817344,1093498551,"2023-02-10", 1),
(NULL,1043817344,1039387284,"2023-02-11", 0),
(NULL,1039294831,1203984002,"2023-02-12", 0),
(NULL,1034938112,1039387284,"2023-02-12", 1),
(NULL,1039294831,1203984002,"2023-02-13", 1),
(NULL,1039294831,1039387284,"2023-03-10", 1);

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

insert into planificador values
(NULL,1203984002,"Cuadriceps"),
(NULL,1203984002,"Triceps"),
(NULL,1093498551,"Biceps"),
(NULL,1093498551,"Cuadriceps"),
(NULL,1039387284,"Biceps"),
(NULL,1203984002,"Isquiotibiales"),
(NULL,1039387284,"Espalda"),
(NULL,1093498551,"Isquiotibiales");


-- Consultas:

SELECT * FROM anteced_salud;

SELECT *
FROM asistencia
ORDER BY fecha_asis DESC;

SELECT * FROM usuarios WHERE ape1_user LIKE "L%" OR ape2_user LIKE "L%";

-- Inner joins

SELECT id_registro_asis, id_instruc_asis, fk_id_aprend_asis, nom1_user, ape1_user, ape2_user, correo_sena_user, fk_anteced_salud_sel, anteced_salud_inp, fecha_asis
FROM asistencia
INNER JOIN usuarios
ON fk_id_aprend_asis=id_user
ORDER BY fecha_asis DESC;

SELECT pkfk_musculo, pkfk_ejercicio, imagen_ejerc
FROM musculos_ejercicios
INNER JOIN ejercicios
ON pkfk_ejercicio=ejercicio
WHERE pkfk_musculo = 'Cuadriceps';

select id_user, tipo_user, nom1_user, nom2_user, ape1_user, ape2_user, correo_sena_user, id_reg_planif, musculo, pkfk_ejercicio
from usuarios
inner join tipos_usuarios
on fk_tipo_user=cod_tipo_user
inner join planificador
on id_user=fk_id_aprend
inner join musculos
on fk_musculo=musculo
inner join musculos_ejercicios
on musculo=pkfk_musculo;

-- Subconsulta

select * from usuarios
where fk_tipo_user=2 AND id_user NOT IN
  (select fk_id_aprend
  from planificador);

-- Edición registros

UPDATE usuarios SET fk_tipo_user = 2 WHERE id_user = 1203984002;
  select * from usuarios WHERE id_user = 1203984002;


UPDATE asistencia SET id_instruc_asis=1039294831, fk_id_aprend_asis=1039387284, fecha_asis='2023-03-12' WHERE id_registro_asis=8;
  select * from asistencia WHERE id_registro_asis=8;


-- Eliminación registros

DELETE FROM asistencia WHERE id_registro_asis=8;
  select * from asistencia WHERE id_registro_asis=8;



-- Seguridad en datos
insert into usuarios values
(1099288928,1,"Juanito", NULL, "Lopez", "Mesa", "juan391a@soy.sena.edu.co", MD5("123"),'Asma', '');
select * from usuarios WHERE id_user = 1099288928;



