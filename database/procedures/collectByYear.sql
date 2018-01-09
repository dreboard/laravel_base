/*
|--------------------------------------------------------------------------
| Coin Categories MySQL Queries
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
*/




/*--------------------------------------------------VIEWS------------------------------------------------------------*/

/*--------------------------------------------------FUNCTIONS------------------------------------------------------------*/





/*
Total Investments By Category FROM Source

Collection::CategoryUserTotalInvestmentSum()
REPLACE UserTotalInvestmentSumByCategory
*/
DELIMITER //
DROP FUNCTION IF EXISTS categoryGetCoinTypesCount//
CREATE FUNCTION categoryGetCoinTypesCount(p_cat VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE typesCollected INT;

    SELECT COUNT(DISTINCT coins.coinType) INTO typesCollected FROM coins
    WHERE coins.coinCategory = p_cat;

    RETURN typesCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/
/*
Get all Category details
CoinCategory::getCategoryDetails()
*/
DELIMITER //
DROP PROCEDURE IF EXISTS CollectionGetCoin//
CREATE PROCEDURE CollectionGetCoin
  (
    IN collectID VARCHAR(50),
    IN id  INT(10)

  )
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get all Category Distinct Types Counts.
                 CoinCategory::categoryLastCountByUser().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET DIAGNOSTICS CONDITION 1
      @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
      SELECT @p1, @p2;
    END;

    SELECT * FROM collection
      INNER JOIN coins ON coins.coinID = collection.coinID
    WHERE collection.collectionID = collectID AND collection.userID = id;

  END //
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CategoryUserTotalInvestmentSumAll//
CREATE PROCEDURE CategoryUserTotalInvestmentSumAll
  (IN id INT,
   IN cat VARCHAR(100)
)
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get all Category Distinct Types Counts.
                 CoinCategory::CategoryUserTotalInvestmentSumAll().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00) AS catCount
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.coinCategory = cat;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CategoryUserTotalInvestmentSumFrom//
CREATE PROCEDURE CategoryUserTotalInvestmentSumFrom
  (IN id INT,
   IN cat VARCHAR(100),
   IN purchaseFrom VARCHAR(100)
)
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Total Investments By Category FROM Source.
                 CoinCategory::CategoryUserTotalInvestmentSumFrom().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00)
    FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
    AND coins.coinCategory = cat
    AND collection.purchaseFrom = purchaseFrom;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CollectionUpdateCleanedCoin//
CREATE PROCEDURE CollectionUpdateCleanedCoin
  (IN id INT,
   IN val INT(1),
   IN user INT(1)
  )
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get all Category Distinct Types Counts.
                 CoinCategory::CategoryUserTotalInvestmentSumAll().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00) AS catCount
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.coinCategory = cat;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CollectionUpdateCoinDetails//
CREATE PROCEDURE CollectionUpdateCoinDetails(
  IN val INT(1),
  IN col CHAR(64),
  IN userID INT(10),
  IN coin INT(100)
)
  BEGIN
    SET @s = CONCAT('UPDATE collection SET ', col, '=', val, 'WHERE userID = ', userID, 'AND collectionID = ',coin);
    #SET @s = CONCAT('SELECT ',col,' FROM ',tbl );
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
  END
//
delimiter ;


/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/