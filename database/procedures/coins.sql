




DELIMITER //
DROP PROCEDURE IF EXISTS CoinsGetByID//
CREATE PROCEDURE CoinsGetByID
  (IN p_id INT)
  BEGIN
    SELECT * FROM coins WHERE coinID = p_id;
  END//
DELIMITER ;