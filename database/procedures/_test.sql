
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
      SELECT coins.coinType,coins.coinType, coins.denomination FROM coins
        WHERE coins.coinType = cointype ORDER BY coins.coinYear DESC;
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