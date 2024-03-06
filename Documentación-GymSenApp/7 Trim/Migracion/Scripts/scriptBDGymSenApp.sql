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
  fk_musculo varchar(50) not null,
  primary key (id_reg_planif)
);

create table musculos
(
  musculo varchar(50) not null,
  primary key (musculo)
);

create table ejercicios
(
  ejercicio varchar(100) not null,
  imagen_ejerc varchar(255) not null,
  primary key (ejercicio)
);

create table musculos_ejercicios
(
  pkfk_musculo varchar(50) not null,
  pkfk_ejercicio varchar(100) not null,
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
(NULL, 1, "Recuerda...", "Estamos disponibles de 6am a 8pm (sujeto a cambios).", "principal.jpg",1),
(NULL, 1, "Si", "Estamos disponibles de 6am a 8pm (sujeto a cambios).", "cuatro.jpg",1);

insert into musculos values
("Cuadriceps"),
("Tríceps"),
("Bíceps"),
("Isquiotibiales"),
("Espalda"),
("Pecho");

insert into ejercicios values
("Leg-press","leg_press.gif"),
("Extension de pierna", "extension_de_pierna.gif"),
("Sentadilla frontal","front_squat.gif"),
("Sentadillas con salto","jump_squat.gif"),
("Peso muerto sumo con pesa rusa","kettlebell_deadlift.gif"),
("Peso muerto con piernas estiradas usando mancuernas","dumbbell_straight_leg_deadlift.gif"),
("Balanceo de pesa","kettlebell_swings.gif"),
("Estocadas","lunge.gif"),
("Copa Tríceps","copa_triceps.gif"),
("Rompecraneos","rompecraneos.gif"),
("Tríceps en polea alta","triceps_pressdownn.gif"),
("Press cerrado con barra","close_grip_bench_press.gif"),
("Contragolpe","kickback.gif"),
("Extensión de tríceps con cable de un solo brazo","single_arm_cable_triceps_extension.gif"),
("Curl con mancuernas","curl_con_mancuernas.gif"),
("Dominadas","dominadas.gif"),
("Curl con barra","barbell_curl.gif"),
("Curl con barra Z en banco Scott","z_bar_preacher_curl.gif"),
("Curl inclinado con mancuernas","incline_dumbbell_curl.gif"),
("Curl de cable de polea baja con barra","bar_low_pulley_cable_curl.gif"),
("Puente isometrico","puente_isometrico.gif"),
("Curl nordico","curl_nordico.gif"),
("Sentadillas con peso corporal","bodyweight_squat.gif"),
("Puente con una sola pierna","single_leg_bridge.gif"),
("Curl de piernas sentado","seated_leg_curl.gif"),
("Jalon al pecho","jalon_al_pecho.gif"),
("Remo brazo","remo_brazo.gif"),
("Remo con barra","barbell_row.gif"),
("Peso muerto con barra","barbell_deadlift.gif"),
("Jalón lateral con brazo recto","straight_arm_lat_pulldown.gif"),
("Remo inclinado con mancuernas","dumbbell_bent_over_rows.gif"),
("Peso muerto sumo con barra","barbell_sumo_deadlift.gif"),
("Barra de press de banca","barbell_bench_press.gif"),
("Press de banca inclinado con mancuernas","incline_dumbbell_bench_press.gif"),
("Contractora","peck_deck.gif"),
("Cruce de cables","cable_crossover.gif"),
("Press de banca con mancuernas","dumbbell_bench_press.gif"),
("Aperturas con mancuernas","dumbbell_fly.gif");

insert into musculos_ejercicios values
("Cuadriceps","Leg-press"),
("Cuadriceps","Extension de pierna"),
("Cuadriceps","Sentadilla frontal"),
("Cuadriceps","Sentadillas con salto"),
("Cuadriceps","Peso muerto sumo con pesa rusa"),
("Cuadriceps","Peso muerto con piernas estiradas usando mancuernas"),
("Cuadriceps","Balanceo de pesa"),
("Cuadriceps","Estocadas"),
("Tríceps","Copa Tríceps"),
("Tríceps","Rompecraneos"),
("Tríceps","Tríceps en polea alta"),
("Tríceps","Press cerrado con barra"),
("Tríceps","Contragolpe"),
("Tríceps","Extensión de tríceps con cable de un solo brazo"),
("Bíceps","Curl con mancuernas"),
("Bíceps","Dominadas"),
("Bíceps","Curl con barra"),
("Bíceps","Curl con barra Z en banco Scott"),
("Bíceps","Curl inclinado con mancuernas"),
("Bíceps","Curl de cable de polea baja con barra"),
("Isquiotibiales","Puente isometrico"),
("Isquiotibiales","Curl nordico"),
("Isquiotibiales","Sentadillas con peso corporal"),
("Isquiotibiales","Puente con una sola pierna"),
("Isquiotibiales","Curl de piernas sentado"),
("Espalda","Jalon al pecho"),
("Espalda","Remo brazo"),
("Espalda","Remo con barra"),
("Espalda","Peso muerto con barra"),
("Espalda","Jalón lateral con brazo recto"),
("Espalda","Remo inclinado con mancuernas"),
("Espalda","Peso muerto sumo con barra"),
("Pecho","Barra de press de banca"),
("Pecho","Press de banca inclinado con mancuernas"),
("Pecho","Contractora"),
("Pecho","Cruce de cables"),
("Pecho","Press de banca con mancuernas"),
("Pecho","Aperturas con mancuernas");