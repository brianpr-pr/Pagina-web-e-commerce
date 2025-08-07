-- Script a ejecutar en phpmyadmin
drop database if exists e_commerce;
CREATE DATABASE e_commerce
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

use e_commerce;
create table productos (
	producto_id varchar(12) PRIMARY KEY,
    nombre varchar(20),
    descripcion varchar(35),
    precio double(8,2),
    categoria varchar(25),
    fecha_agregacion date,
    nombre_archivo varchar(40)
);


create table carro (
    carro_id varchar(13) PRIMARY KEY,
    cantidad int
);

create table usuarios (
	usuario_id varchar(12) PRIMARY KEY,
    contraseña varchar(30),
    nombre varchar(20),
    apellidos varchar(30),
    direccion varchar(40),
	fecha_nacimiento date,
    foto_perfil varchar(30),
    carro_id varchar(13),
    FOREIGN KEY (carro_id) REFERENCES carro(carro_id)
);

create table producto_per_carro(
	producto_id varchar(12),
    carro_id varchar(13),
    cantidad int,
    precio_total decimal(8,2),
    PRIMARY KEY (producto_id, carro_id),
    FOREIGN KEY (carro_id) REFERENCES carro(carro_id),
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id)
);

INSERT INTO productos (producto_id, nombre, descripcion, precio, categoria, fecha_agregacion, nombre_archivo) VALUES
('P001', 'desconocido', 'Altavoz portátil Bluetooth', 29.99, 'Electrónica', '2025-07-01', 'stock_uno.jpg'),
('P002', 'desconocido', 'Camiseta 100% algodón', 14.50, 'Ropa', '2025-07-02', 'stock_dos.jpg'),
('P003', 'desconocido', 'Lámpara de escritorio LED', 19.99, 'Hogar', '2025-07-03', 'stock_tres.jpg'),
('P004', 'desconocido', 'Mouse inalámbrico ergonómico', 25.75, 'Informática', '2025-07-04', 'stock_uno.jpg'),
('P005', 'desconocido', 'Mochila impermeable escolar', 32.10, 'Accesorios', '2025-07-05', 'stock_cuatro.jpg');