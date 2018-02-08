


LOCK TABLES coins READ;
CALL CoinsGetLikeID(1197);
UNLOCK TABLES;

SELECT DAY(CURDATE());


DELIMITER \\

CREATE FUNCTION CustomerLevel(p_id INT) RETURNS INT(4)
DETERMINISTIC
  BEGIN
    DECLARE p_year INT(4);

    IF p_creditLimit > 50000 THEN
      SET lvl = 'PLATINUM';
    ELSEIF (p_creditLimit <= 50000 AND p_creditLimit >= 10000) THEN
      SET lvl = 'GOLD';
    ELSEIF p_creditLimit < 10000 THEN
      SET lvl = 'SILVER';
    END IF;

    RETURN (lvl);
  END\\
DELIMITER ;

/***********************************************************
--cursors

ERROR 1062 (23000): Duplicate entry '1' for key 1
ERROR 1048 (23000): Column 'emp_id' cannot be null

************************************************************/
DELIMITER \\
CREATE PROCEDURE _TestType(cointype VARCHAR(100))

  BEGIN
    DECLARE type VARCHAR(100);
    DECLARE denom DECIMAL;
    DECLARE type_cursor CURSOR FOR
      SELECT c.coinType, c.denomination FROM coins c
        WHERE c.coinType = cointype ORDER BY c.coinYear DESC;
    -- open
    OPEN type_cursor;
    LOOP
      FETCH type_cursor INTO type, denom;
      SELECT concat('Coin type ', type) as type, concat('value of $', denom) as denom;
    END LOOP;
    CLOSE type_cursor;
  END\\
  DELIMITER ;

CALL _TestType('Westward Journey');


/*
'Seated Dime No Stars'
SELECT DISTINCT(coins.designType) FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE coins.coinType = 'Seated Liberty Dime' AND collection.userID = 5
    ORDER BY coins.coinYear ASC
    */








  -- end