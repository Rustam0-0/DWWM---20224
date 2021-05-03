-- des procédures stockées
DELIMITER |
CREATE PROCEDURE ajoutFournisseur()
BEGIN
SELECT suppliers.sup_name FROM suppliers
WHERE suppliers.sup_countries_id = "FR";
END |
DELIMITER ;

DELIMITER |
CREATE PROCEDURE addSupplier(IN strana varchar(25))
BEGIN
SELECT * FROM suppliers
WHERE suppliers.sup_countries_id = strana;
END |
DELIMITER ;

CALL addSupplier('FR')


-- Ex_1
DELIMITER |
CREATE PROCEDURE LstSuppliers()
BEGIN
SELECT DISTINCT sup_id, suppliers.sup_name, suppliers.sup_address, suppliers.sup_contact, suppliers.sup_phone, suppliers.sup_mail FROM suppliers
JOIN products
ON suppliers.sup_id = products.pro_sup_id;
END |
DELIMITER ;

-- Ex_2
DELIMITER |
CREATE PROCEDURE Lst_Rush_Orders()
BEGIN
SELECT orders.ord_id, orders.ord_status FROM orders
WHERE orders.ord_status = "Commande urgente";
END |
DELIMITER ;

-- Ex_3
DELIMITER |
CREATE PROCEDURE CA_Supplier (IN c int(3), IN y int (4))
BEGIN
SELECT TRUNCATE (SUM(orders_details.ode_unit_price * (100 - orders_details.ode_discount) / 100 * orders_details.ode_quantity), 2) FROM orders_details
JOIN orders
ON orders_details.ode_ord_id = orders.ord_id
JOIN products
ON products.pro_id = orders_details.ode_pro_id
JOIN suppliers
ON suppliers.sup_id = products.pro_sup_id
WHERE YEAR(orders.ord_order_date) = y
AND suppliers.sup_id = c;
END |
DELIMITER ;


DELIMITER |
CREATE PROCEDURE ()
BEGIN

END |
DELIMITER ;