Clase users:
id
username
password
email
phone
avatar
rol

Clase products:
id
name
description
price
stock
image
id_category

Clase carts:
id
id_user

Clase Prod_carrito:
id
quantity
id_cart
id_product

Clase Pedido:
id
id_user
id_cart
total ---
status
date

Clase Categoria:
id
name
description
-----------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE
    users (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        password VARCHAR(255),
        email VARCHAR(50),
        phone VARCHAR(15),
        avatar VARCHAR(100),
        rol VARCHAR(20)
    );

CREATE TABLE
    categories (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        description TEXT
    );

CREATE TABLE
    products (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        description TEXT,
        price DECIMAL(10, 2),
        stock INT (11),
        image VARCHAR(100),
        id_category INT (11),
        FOREIGN KEY (id_category) REFERENCES categories (id)
    );

CREATE TABLE
    carts (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        id_user INT (11),
        FOREIGN KEY (id_user) REFERENCES users (id)
    );

CREATE TABLE
    product_cart (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        quantity INT (11),
        id_cart INT (11),
        id_product INT (11),
        FOREIGN KEY (id_cart) REFERENCES carts (id),
        FOREIGN KEY (id_product) REFERENCES products (id)
    );

CREATE TABLE
    orders (
        id INT (11) AUTO_INCREMENT PRIMARY KEY,
        id_user INT (11),
        id_cart INT (11),
        status VARCHAR(20),
        date DATETIME,
        FOREIGN KEY (id_user) REFERENCES users (id),
        FOREIGN KEY (id_cart) REFERENCES carts (id)
    );