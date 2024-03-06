
-- Para entrar a mysql
mysql -u root -h localhost


-- Para usar la base de datos
use bd_gymsenapp


-- Para importar archivo csv de usuarios
LOAD DATA
LOCAL INFILE 'C:/Users/VICTUS/Downloads/G2_GSA_CSV_usuarios.csv'
INTO TABLE usuarios
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;


-- Para importar archivo csv de usuarios
LOAD DATA
LOCAL INFILE 'C:/Users/VICTUS/Downloads/G2_GSA_CSV_asistencia.csv'
INTO TABLE asistencia
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(id_instruc_asis,fk_id_aprend_asis,fecha_asis,estado_asis);


