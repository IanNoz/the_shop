CREATE DATABASE the_shop_project;
USE the_shop_project;

CREATE TABLE users(
id 			int(255) auto_increment NOT NULL,
name		varchar(100) NOT NULL,
surname		varchar(255),
email		varchar(255) NOT NULL,
password	varchar(255) NOT NULL,
rol 		varchar(20),
image		varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=innoDb;

INSERT INTO users VALUES(NULL, 'Admin', 'Admin', 'admin@admin', 'password', 'admin', NULL);


CREATE TABLE categories(
id 			int(255) auto_increment NOT NULL,
name		varchar(100) NOT NULL,
CONSTRAINT pk_categories PRIMARY KEY(id) 
)ENGINE=innoDb;

INSERT INTO categories VALUES(NULL, 'short sleeves');
INSERT INTO categories VALUES(NULL, 'tops');
INSERT INTO categories VALUES(NULL, 'long sleeves');
INSERT INTO categories VALUES(NULL, 'jumpers');


CREATE TABLE products(
id 			int(255) auto_increment NOT NULL,
category_id int(255) NOT NULL,
name		varchar(100) NOT NULL,
description text,
price 		float(100,2) NOT NULL,
stock		int(255) NOT NULL,
offer		varchar(2),
pdate     	date NOT NULL,
image		varchar(255),
CONSTRAINT pk_products PRIMARY KEY(id),
CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=innoDb;


CREATE TABLE orders(
id 			int(255) auto_increment NOT NULL,
user_id int(255) NOT NULL,
contry		varchar(100) NOT NULL,
postcode	varchar(100) NOT NULL,
address		varchar(255) NOT NULL,
cost 		float(200,2) NOT NULL,
status		varchar(20),
odate     	date,
otime		time,
CONSTRAINT pk_orders PRIMARY KEY(id),
CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=innoDb;


CREATE TABLE orders_rows(
id 			    int(255) auto_increment NOT NULL,
order_id 		int(255) NOT NULL,
product_id 		int(255) NOT NULL,
units           int(255) NOT NULL,
CONSTRAINT pk_orders_rows PRIMARY KEY(id),
CONSTRAINT fk_order_row FOREIGN KEY(order_id) REFERENCES orders(id),
CONSTRAINT fk_product_row FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=innoDb;