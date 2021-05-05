-- Vues
CREATE VIEW cat_pro AS
SELECT products.pro_id, products.pro_name, categories.cat_id, categories.cat_name
FROM products
JOIN categories
ON categories.cat_id = products.pro_cat_id

-- Procédures stockées
DELIMITER |
CREATE PROCEDURE facture(IN num_com int)
BEGIN
SELECT orders.ord_id, customers.cus_id, customers.cus_lastname, customers.cus_address, customers.cus_phone,
products.pro_ref, products.pro_name, products.pro_price, orders_details.ode_quantity, orders_details.ode_discount,
TRUNCATE((orders_details.ode_unit_price * (100 - orders_details.ode_discount) / 100 * orders_details.ode_quantity), 2) AS 'Total'
FROM customers
JOIN orders
ON customers.cus_id = orders.ord_cus_id
JOIN orders_details
ON orders.ord_id = orders_details.ode_ord_id
JOIN products
ON orders_details.ode_pro_id = products.pro_id
WHERE orders.ord_id = num_com;
END |
DELIMITER ;

-- Triggers
DELIMITER $$
CREATE TRIGGER after_products_update
AFTER UPDATE 
ON products
FOR EACH ROW
BEGIN    
    IF (new.pro_stock < new.pro_stock_alert)
    THEN
        IF NOT EXISTS(SELECT codart FROM commander_articles WHERE codart = new.pro_id)
        THEN
            INSERT INTO commander_articles(codart, qte, com_date)
            VALUES(new.pro_id, (new.pro_stock_alert - new.pro_stock), CURRENT_DATE);
        ELSE 
            UPDATE commander_articles
            SET codart = new.pro_id, qte = (new.pro_stock_alert - new.pro_stock), com_date = CURRENT_DATE
            WHERE codart = new.pro_id;
        END IF;
    ELSE
    DELETE FROM commander_articles WHERE codart = new.pro_id;
    END IF;
END $$
DELIMITER ;


-- Transactions

-- Operations:
-- 1. ajouter ule ligne 'retraite' dans la table 'posts'
-- 2. changer le post de Amity HANAN au post 'retraite'
-- 3. fair un requête pour vérifier quel employé est un pépiniériste le plus ancien du magasin N°2, renvoie (emp_id=10, HILLARY)
-- 4. changer le post de (emp_id=10, HILLARY) au numéro '2'(Manager) 
-- 5. changer les emp_supperior_id d'autres pépiniéristes du magasin N°2 au '10'(emp_id=10, HILLARY)
-- 6. augmeter le salaire de 5% pour (emp_id=10, HILLARY)

-- (1)
INSERT INTO posts(pos_libelle) VALUES('Retraite')

-- (2)
UPDATE employees SET employees.emp_pos_id = 36 WHERE employees.emp_lastname = 'HANNAH'

-- (3)
SELECT employees.emp_id FROM employees
JOIN shops
ON shops.sho_id = employees.emp_sho_id
JOIN posts
ON posts.pos_id = emp_pos_id
WHERE sho_id = 2 AND posts.pos_libelle = 'Pépiniériste' 
ORDER BY emp_enter_date 
LIMIT 1

-- ou comme ça:
SELECT employees.emp_id FROM employees
JOIN shops
ON shops.sho_id = employees.emp_sho_id
JOIN posts
ON posts.pos_id = emp_pos_id
WHERE emp_enter_date = (SELECT MIN(emp_enter_date) FROM employees
JOIN posts
ON emp_pos_id = posts.pos_id
JOIN shops
ON emp_sho_id = shops.sho_id
WHERE posts.pos_libelle = 'Pépiniériste'
AND shops.sho_id = 2)

-- (4)
UPDATE employees SET emp_pos_id = 2 WHERE emp_id = 10

-- (5)
UPDATE employees
JOIN shops
ON shops.sho_id = employees.emp_sho_id
JOIN posts
ON posts.pos_id = emp_pos_id
SET emp_superior_id = 10
WHERE sho_id = 2 AND posts.pos_libelle = 'Pépiniériste'

-- (6)
UPDATE employees SET emp_salary = emp_salary * 1.05 WHERE emp_id = 10

-- Transaction

START TRANSACTION;

    INSERT INTO posts(pos_libelle) VALUES('Retraite');

    UPDATE employees SET employees.emp_pos_id = (SELECT pos_id FROM posts WHERE pos_libelle = 'Retraite') WHERE employees.emp_lastname = 'HANNAH';

    UPDATE employees SET emp_pos_id = 2 WHERE emp_id = 10;

    UPDATE employees
    JOIN shops
    ON shops.sho_id = employees.emp_sho_id
    JOIN posts
    ON posts.pos_id = emp_pos_id
    SET emp_superior_id = 10
    WHERE sho_id = 2 AND posts.pos_libelle = 'Pépiniériste';

    UPDATE employees SET emp_salary = emp_salary * 1.05 WHERE emp_id = 10;

COMMIT

-- vérifier
SELECT employees.emp_id, employees.emp_superior_id, employees.emp_lastname, pos_id, pos_libelle, employees.emp_salary FROM employees
JOIN shops
ON shops.sho_id = employees.emp_sho_id
JOIN posts
ON pos_id = employees.emp_pos_id
WHERE shops.sho_id = 2 AND pos_libelle = 'Pépiniériste' OR emp_id = 10
ORDER BY emp_id

-- Transaction inverse
START TRANSACTION;

    UPDATE employees SET emp_salary = 20450 WHERE emp_id = 10;

    UPDATE employees
    JOIN shops
    ON shops.sho_id = employees.emp_sho_id
    JOIN posts
    ON posts.pos_id = emp_pos_id
    SET emp_superior_id = 17
    WHERE sho_id = 2 AND posts.pos_libelle = 'Pépiniériste';

    UPDATE employees SET emp_pos_id = 14 WHERE emp_id = 10;

    UPDATE employees SET employees.emp_pos_id = 2 WHERE employees.emp_lastname = 'HANNAH';

    DELETE FROM posts WHERE pos_libelle = 'Retraite';

COMMIT