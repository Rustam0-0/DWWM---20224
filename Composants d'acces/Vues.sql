-- Exercise_2
-- 1.
CREATE VIEW v_Details AS
select orders_details.ode_pro_id,
sum(orders_details.ode_quantity) AS `QteTot`,
truncate(sum((((orders_details.ode_unit_price * (100 - orders_details.ode_discount)) / 100) * `orders_details`.`ode_quantity`)),2) AS `PrixTot`
from orders_details
group by orders_details.ode_ord_id

-- 2.
CREATE VIEW v_Ventes_Zoom AS
SELECT orders_details.*
FROM orders_details
JOIN products
ON products.pro_id = orders_details.ode_pro_id
WHERE products.pro_ref = "ZOOM"

