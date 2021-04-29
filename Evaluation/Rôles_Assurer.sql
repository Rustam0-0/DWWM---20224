-- Rôles
CREATE ROLE 'marketing'@'localhost'
GRANT INSERT, UPDATE, DELETE ON afpa_gescom.products, afpa_gescom.categories TO 'marketing'@'localhost'
GRANT SELECT ON afpa_gescom.orders, afpa_gescom.orders_details, afpa_gescom.customers TO 'marketing'@'localhost'


-- Assurer les sauvegardes
cd C:\wamp64\bin\mysql\mysql8.0.21\bin

C:\wamp64\bin\mysql\mysql8.0.21\bin>mysqldump --user=root --password= --databases afpa_gescom > c:\Backup\backup_afpa_gescom.sql