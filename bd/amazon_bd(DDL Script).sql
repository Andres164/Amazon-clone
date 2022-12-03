USE amazon_bd;

CREATE TABLE articulos (
    nombre_articulo VARCHAR(70) NOT NULL,
    precio DOUBLE NOT NULL,
    stock INTEGER NOT NULL DEFAULT 0,
    tiempo_envio TIME NOT NULL,
    proveeodr_id INT,
    ASIN CHAR(12) PRIMARY KEY
);

CREATE TABLE proveedores (
	nombre VARCHAR(70) NOT NULL,
    proveedor_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE usuarios (
    direccion VARCHAR(100),
    carrito_id INT,
    nombre_usuario VARCHAR(50) PRIMARY KEY
);

CREATE TABLE carrito (
    nombre_usuario VARCHAR(50) NOT NULL,
    carrito_id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE detalles_carrito (
    carrito_id INT,
    articulo_ASIN CHAR(12),
    detalles_carrito_id INT PRIMARY KEY AUTO_INCREMENT
);

