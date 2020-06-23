CREATE DATABASE farmacia_bd;

CREATE TABLE tbl_medicamento(
id INT PRIMARY KEY AUTO_INCREMENT,
nombre_medicamento VARCHAR(50),
cantidad INT,
precio DOUBLE(5,2),
fecha_vencimiento DATE 
);

SELECT*FROM tbl_medicamento

DROP TABLE	medicamento;

TRUNCATE TABLE tb1_medicamento;







