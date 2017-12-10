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
DROP VIEW IF EXISTS allCategoriesListView;
CREATE VIEW allCategoriesListView AS SELECT DISTINCT coinCategory FROM `coins` ORDER BY denomination DESC;







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
DROP PROCEDURE IF EXISTS CategoryGetDetails//
CREATE PROCEDURE CategoryGetDetails
  (IN cat VARCHAR(100)
 )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Total Investments By Category FROM Source.
                MODEL-CoinCategory::getCategoryDetails().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT * FROM coincategories WHERE coinCategory = cat;
  END//
DELIMITER ;







DELIMITER //
DROP PROCEDURE IF EXISTS CategoryDistinctCoinTypes//
CREATE PROCEDURE CategoryDistinctCoinTypes
  (IN cat VARCHAR(100))
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Total Investments By Category FROM Source.
                Collection::CategoryUserTotalInvestmentSum().
                REPLACE UserTotalInvestmentSumByCategory
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT DISTINCT coinType,
      categoryGetCoinTypesCount(cat) AS typeCount
    FROM coins
    WHERE coins.coinCategory = cat;
  END//
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS CategoryDistinctWithTypesCount//
CREATE PROCEDURE CategoryDistinctWithTypesCount
  (IN cat VARCHAR(100)
)
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get all Category Distinct Types Counts.
                CoinCategory::getTypesByCategory().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Types counts not found';
    SELECT DISTINCT coinCategory,
      categoryGetCoinTypesCount(cat) AS typeCount
    FROM coins
    WHERE coins.coinCategory = cat;
  END//
DELIMITER ;




DELIMITER //
DROP PROCEDURE IF EXISTS CategoryCollectedCountByUser//
CREATE PROCEDURE CategoryCollectedCountByUser
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
          AND coins.coinCategory = cat;
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

/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/