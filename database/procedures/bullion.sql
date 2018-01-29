/*
|--------------------------------------------------------------------------
| Coin commemorative MySQL Queries
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
*/




/*--------------------------------------------------VIEWS------------------------------------------------------------*/
DROP VIEW IF EXISTS BullionCategories;
CREATE OR REPLACE VIEW BullionCategories AS SELECT DISTINCT(coinCategory) FROM coins WHERE coinMetal IN ('Gold', 'Platinum', 'Palladium') ORDER BY denomination;

#CREATE OR REPLACE VIEW





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

DELIMITER //
DROP PROCEDURE IF EXISTS CategoryBullionCollectedCountByUser//
CREATE PROCEDURE CategoryBullionCollectedCountByUser
  (
    IN cat VARCHAR(20),
    IN id  INT

  )
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get all Category Distinct Types Counts.
                 CoinCategory::CategoryCollectedCountByUser().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COUNT(*) AS catCount FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
    AND coins.coinCategory = cat
    AND coins.coinMetal IN ('Gold', 'Platinum', 'Palladium');
  END //
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS CategoryBullionUserTotalInvestmentSumAll//
CREATE PROCEDURE CategoryBullionUserTotalInvestmentSumAll
  (
    IN id INT,
    IN cat VARCHAR(100)
)
  COMMENT 'Get Bullion investment'
  READS SQL DATA
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get Bullion investment.
                 CoinCategory::CategoryUserTotalInvestmentSumAll().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00) AS catCount
    FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
    AND coins.coinCategory = cat
    AND coins.coinMetal IN ('Gold', 'Platinum', 'Palladium');
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CategoryBullionUserTotalInvestmentSumFrom//
CREATE PROCEDURE CategoryBullionUserTotalInvestmentSumFrom
(
  IN id INT,
  IN cat VARCHAR(100),
  IN purchaseFrom VARCHAR(100)
)
  COMMENT 'Get Bullion investment by category'
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Total Bullion Investments By Category FROM Source.
                 CoinCategory::CategoryUserTotalInvestmentSumFrom().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00)
    FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
    AND coins.coinCategory = cat
    AND coins.coinMetal IN ('Gold', 'Platinum', 'Palladium')
    AND collection.purchaseFrom = purchaseFrom;
  END//
DELIMITER ;

/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/