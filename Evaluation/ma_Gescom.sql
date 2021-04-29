-- on crée la base de données

DROP DATABASE IF EXISTS ma_Gescom;

CREATE DATABASE ma_Gescom; 
USE ma_Gescom;

-- on crée les tables de la base avec des clé 'primary, auto_increment' et les clés 'foreignes' pour lier les tables les unes aux autres.
-- aussi on indique les types de données et les contraintes.
-- NOT NULL indique que la colonne n'accepte pas les valeurs NULL

CREATE TABLE clients (
	client_id 			  INT AUTO_INCREMENT NOT NULL,
	client_nom 		    VARCHAR(50) NOT NULL,
	client_adresse		VARCHAR(50) NOT NULL,
	client_ville 		  VARCHAR(50) NOT NULL,
  PRIMARY KEY (client_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categories (
	cat_id        INT NOT NULL AUTO_INCREMENT,
	cat_name      VARCHAR(50),
	PRIMARY KEY (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE posts (
  pos_id int(10)  NOT NULL AUTO_INCREMENT,
  pos_libelle varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (pos_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE suppliers (
  sup_id int(10) NOT NULL AUTO_INCREMENT,
  sup_name varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  sup_address varchar(150) NOT NULL,
  PRIMARY KEY (sup_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE orders (
	ord_id INT NOT NULL AUTO_INCREMENT,
  ord_client_id INT NOT NULL,
  ord_order_date date NOT NULL,
  ord_payment_date date NOT NULL,
  ord_ship_date date NOT NULL,
	FOREIGN KEY (ord_client_id) REFERENCES clients(client_id),
	PRIMARY KEY (ord_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE stock (
	pro_id INT NOT NULL AUTO_INCREMENT,
 	pro_name VARCHAR(50) NOT NULL,
  pro_price decimal(7,2) NOT NULL,
  pro_stock_current int(5) NOT NULL,
  pro_stock_alert int(5) NOT NULL,
  pro_add_date datetime NOT NULL,
  pro_sup_id INT NOT NULL,
  pro_cat_id INT NOT NULL,
  PRIMARY KEY (pro_id),
	FOREIGN KEY (pro_sup_id) REFERENCES suppliers(sup_id),
  FOREIGN KEY (pro_cat_id) REFERENCES categories(cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE employees (
	emp_id INT NOT NULL AUTO_INCREMENT,
	emp_name varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	emp_address varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	emp_enter_date DATETIME NOT NULL,
	emp_salary int(10) DEFAULT NULL,
	emp_gender char(1) NOT NULL,
  emp_children tinyint(2) NOT NULL,
  emp_pos_id INT NOT NULL,
	FOREIGN KEY (emp_pos_id) REFERENCES posts(pos_id),
	PRIMARY KEY (emp_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE orders_details (
  ode_id int(10) NOT NULL AUTO_INCREMENT,
  ode_unit_price decimal(7,2) NOT NULL,
  ode_discount decimal(4,2) DEFAULT NULL,
  ode_quantity int(5) NOT NULL,
  ode_ord_id INT NOT NULL,
  ode_pro_id INT NOT NULL,
  FOREIGN KEY (ode_ord_id) REFERENCES orders(ord_id),
  FOREIGN KEY (ode_pro_id) REFERENCES stock(pro_id),
  PRIMARY KEY (ode_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- on remplit certains champs de tableaux

INSERT INTO clients (client_nom, client_adresse, client_ville)                         VALUES ('Dupont', '1 rue de Paris', 'Amiens');
INSERT INTO categories (cat_name)                                                      VALUES ('products of garden');
INSERT INTO posts (pos_libelle)                                                        VALUES ('vendeur');
INSERT INTO suppliers (sup_name)                                                       VALUES ('SuperStar');
INSERT INTO orders (ord_client_id, ord_order_date)                                     VALUES (1,'2021-04-29');
INSERT INTO stock (pro_name, pro_price, pro_stock_current, pro_sup_id, pro_cat_id)     VALUES ('Barbecue', 777, 666, 1, 1);
INSERT INTO employees (emp_name, emp_salary, emp_pos_id)                               VALUES ('Macron', 10000, 1);
INSERT INTO orders_details (ode_unit_price, ode_quantity, ode_ord_id, ode_pro_id)      VALUES (99, 3, 1, 1);
