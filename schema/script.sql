mysql> create database senazon;
mysql> use senazon;
mysql> 

CREATE TABLE USUARIOS(
    id_usuario INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE TIENDAS(
    id_tienda INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    url_tienda VARCHAR(40) UNIQUE NOT NULL,
    owner_tienda VARCHAR(50) NOT NULL,
    nombre_tienda VARCHAR(50) NOT NULL,
    info_tienda VARCHAR(255) NOT NULL,
    key_paypal VARCHAR(255) DEFAULT NULL,
    telefono_tienda VARCHAR(15) NOT NULL,
    layout SMALLINT DEFAULT 1,
    FOREIGN KEY(owner_tienda)
        REFERENCES USUARIOS(email)
            ON DELETE CASCADE
);

CREATE TABLE PRODUCTOS(
    id_producto INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    owner_producto VARCHAR(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    precio FLOAT NOT NULL,
    informacion VARCHAR(255) NOT NULL,
    url_imagen VARCHAR(255) NOT NULL, 
    stock SMALLINT NOT NULL,
    FOREIGN KEY(owner_producto)
        REFERENCES TIENDAS(owner_tienda)
            ON DELETE CASCADE
);

CREATE TABLE VENTAS(
    id_venta INT PRIMARY KEY NOT NULL,
    owner_venta VARCHAR(50) NOT NULL,
    precio_total FLOAT NOT NULL,
    nombre_comprador VARCHAR(50) NOT NULL,
    descripcion VARCHAR(800) NOT NULL,
    direccion_entrega VARCHAR(255) NOT NULL,
    estado_entrega TINYINT NOT NULL DEFAULT 1,
    FOREIGN KEY(owner_venta)
        REFERENCES TIENDAS(owner_tienda)
            ON DELETE CASCADE
);

CREATE TABLE CUPONES(
    id_cupon INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    nombre_cupon VARCHAR(7) UNIQUE NOT NULL,
    owner_cupon VARCHAR(50) NOT NULL,
    FOREIGN KEY(owner_cupon)
        REFERENCES TIENDAS(owner_tienda)
            ON DELETE CASCADE
);