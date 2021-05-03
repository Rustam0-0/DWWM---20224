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
