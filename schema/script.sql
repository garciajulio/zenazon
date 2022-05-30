mysql> create database senazon;
mysql> use senazon;
mysql>

CREATE TABLE TIENDAS(
    id_tienda INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_privado VARCHAR(30) UNIQUE NOT NULL,
    url_tienda VARCHAR(40) UNIQUE NOT NULL,
    nombre_tienda VARCHAR(40) NOT NULL,
    info_tienda VARCHAR(255) NOT NULL,
    key_paypal VARCHAR(255) DEFAULT NULL,
    telefono_tienda VARCHAR(15) NOT NULL,
    layout SMALLINT DEFAULT 1
);

CREATE TABLE USUARIOS(
    id_usuario INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_privado VARCHAR(30) NOT NULL, 
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    FOREIGN KEY(id_privado)
        REFERENCES TIENDAS(id_privado)
            ON DELETE CASCADE
);

CREATE TABLE PRODUCTOS(
    id_producto INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_privado VARCHAR(30) NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    precio FLOAT(6,2) NOT NULL,
    informacion VARCHAR(255) NOT NULL,
    url_imagen VARCHAR(255) NOT NULL, 
    stock SMALLINT NOT NULL,
    FOREIGN KEY(id_privado)
        REFERENCES TIENDAS(id_privado)
            ON DELETE CASCADE
);


CREATE TABLE VENTAS(
    id_venta INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_privado VARCHAR(30) NOT NULL,
    precio_total FLOAT(6,2) NOT NULL,
    descripcion VARCHAR(1000) NOT NULL,
    direccion_entrega VARCHAR(255) NOT NULL,
    telefono_contacto INT(15) NOT NULL,
    FOREIGN KEY(id_privado)
        REFERENCES TIENDAS(id_privado)
            ON DELETE CASCADE
);

CREATE TABLE CUPONES(
    id_cupon INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    nombre_cupon VARCHAR(7) UNIQUE NOT NULL,
    porcentaje SMALLINT NOT NULL,
    id_privado VARCHAR(30) NOT NULL,
    FOREIGN KEY(id_privado)
        REFERENCES TIENDAS(id_privado)
            ON DELETE CASCADE
);