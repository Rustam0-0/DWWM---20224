-- Q1
SELECT CONCAT(employees.emp_lastname, '', employees.emp_firstname) AS 'salairié', employees.emp_children FROM employees
ORDER BY emp_children DESC, employees.emp_lastname ASC

-- Q2
SELECT customers.cus_lastname, customers.cus_firstname, customers.cus_countries_id FROM customers WHERE customers.cus_countries_id != 'FR'

-- Q3
SELECT cus_city, cus_countries_id, countries.cou_name FROM customers JOIN countries ON customers.cus_countries_id = countries.cou_id
ORDER BY cus_city

-- Q4
SELECT customers.cus_lastname, customers.cus_update_date FROM customers WHERE customers.cus_update_date IS NOT NULL

-- Q5
SELECT customers.cus_id, customers.cus_lastname, customers.cus_firstname, customers.cus_city FROM customers WHERE customers.cus_city LIKE '%divos%'

-- Q6
SELECT products.pro_id, products.pro_name, products.pro_price FROM products
ORDER BY products.pro_price LIMIT 1

-- Q7
SELECT products.pro_id, products.pro_ref, products.pro_name FROM products
WHERE products.pro_id NOT IN (SELECT orders_details.ode_pro_id FROM orders_details)

-- Q8
SELECT products.pro_id, products.pro_ref, products.pro_name, customers.cus_id, orders.ord_id, orders_details.ode_id FROM products

JOIN orders_details
ON products.pro_id=orders_details.ode_pro_id

JOIN orders
ON orders_details.ode_ord_id=orders.ord_id

JOIN customers
ON customers.cus_id=orders.ord_cus_id

WHERE customers.cus_lastname = 'Pikatchien'

-- Q9
SELECT categories.cat_id, categories.cat_name, products.pro_name FROM categories
JOIN products
ON products.pro_cat_id=categories.cat_id
ORDER BY categories.cat_name

-- Q10
SELECT CONCAT(salarié.emp_lastname, ' ', salarié.emp_firstname, ', ', salarposts.pos_libelle) AS 'Employé',
CONCAT(superieur.emp_lastname, ' ', superieur.emp_firstname, ', ', superposts.pos_libelle) AS 'Supérieur'

FROM employees as `salarié`

JOIN employees as `superieur`
ON `salarié`.emp_superior_id = `superieur`.emp_id

JOIN shops
ON shops.sho_id = salarié.emp_sho_id

JOIN posts as `salarposts`
ON salarposts.pos_id = salarié.emp_pos_id

JOIN posts as `superposts`
ON superposts.pos_id = superieur.emp_pos_id

WHERE shops.sho_city = 'Compiègne'
ORDER BY employé

-- Q11
SELECT orders_details.ode_discount, products.pro_id, products.pro_name, orders.ord_id, orders_details.ode_id FROM orders_details
JOIN products
ON orders_details.ode_pro_id = products.pro_id
JOIN orders
ON orders_details.ode_ord_id = orders.ord_id
WHERE orders_details.ode_discount = (SELECT MAX(orders_details.ode_discount) FROM orders_details)

-- Q12 manque

-- Q13
SELECT COUNT(customers.cus_countries_id) AS 'Nb clients Canada' FROM customers
WHERE customers.cus_countries_id = 'CA'

-- Q14
SELECT orders_details.*, orders.ord_order_date FROM orders_details
JOIN orders
ON orders_details.ode_ord_id = orders.ord_id
WHERE orders.ord_order_date BETWEEN '2020-01-01' AND '2020-12-31'

-- Q15
SELECT DISTINCT suppliers.sup_name, suppliers.sup_address, suppliers.sup_contact, suppliers.sup_phone, suppliers.sup_mail FROM suppliers
JOIN products
ON suppliers.sup_id = products.pro_sup_id

-- Q16
SELECT TRUNCATE (SUM(orders_details.ode_unit_price * (100 - orders_details.ode_discount) / 100 * orders_details.ode_quantity), 2) FROM orders_details
JOIN orders
ON orders_details.ode_ord_id = orders.ord_id
WHERE orders.ord_order_date BETWEEN '2020-01-01' AND '2020-12-31'

-- Q17
SELECT TRUNCATE ( avg(tot), 2)
FROM (
    SELECT SUM(orders_details.ode_unit_price * (100 - orders_details.ode_discount) / 100 * orders_details.ode_quantity) AS 'tot' FROM orders_details
    JOIN orders
    ON orders_details.ode_ord_id = orders.ord_id
    GROUP BY ode_ord_id
	) AS totaux

-- Q18
SELECT orders.ord_id, customers.cus_lastname, orders.ord_order_date, TRUNCATE(SUM(orders_details.ode_unit_price * (100 - orders_details.ode_discount) / 100 * orders_details.ode_quantity), 2) AS 'Total' FROM orders
JOIN orders_details
ON orders_details.ode_ord_id = orders.ord_id
JOIN customers
ON customers.cus_id = orders.ord_cus_id
GROUP BY orders.ord_id
ORDER BY Total DESC

-- Q19
UPDATE products SET products.pro_name = 'Camper', products.pro_price = 90
WHERE products.pro_ref = 'barb004'

-- Q20
UPDATE products
JOIN categories
ON products.pro_cat_id = categories.cat_id
SET products.pro_price = products.pro_price * 1.011
WHERE categories.cat_name = 'Parasols'

-- Q21
DELETE products.* FROM products
JOIN categories
ON categories.cat_id = pro_cat_id
WHERE products.pro_id NOT IN (SELECT orders_details.ode_pro_id FROM orders_details)
AND categories.cat_name = "Tondeuses électriques"

