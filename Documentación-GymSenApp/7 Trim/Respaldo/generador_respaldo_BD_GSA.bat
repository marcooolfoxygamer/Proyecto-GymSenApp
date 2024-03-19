set anio=%date:~-4,4%
set mes=%date:~-7,2%
set dia=%date:~-10,2%
set hora=%time:~0,2%
set minuto=%time:~3,2%
set segundo=%time:~6,2%
set nombre=gymsenapp_respaldo_%anio%-%mes%-%dia%-%hora%_%minuto%_%segundo%.sql
cd "C:\xampp\mysql\bin"
mysqldump -u root -p bd_gymsenapp > "C:\Users\VICTUS\Downloads\copias_seguridad_BD_GSA\%nombre%"