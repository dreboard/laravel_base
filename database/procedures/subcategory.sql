/*
|--------------------------------------------------------------------------
| Coin Sub Category MySQL Queries
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
DROP FUNCTION IF EXISTS subcatGetCount//
CREATE FUNCTION subcatGetCount(subcat VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE coinSubCategoryCollected INT;

    SELECT COUNT(DISTINCT coins.coinVersion) INTO coinSubCategoryCollected FROM coins
    WHERE coins.coinSubCategory = subcat;

    RETURN coinSubCategoryCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/

DELIMITER //
DROP PROCEDURE IF EXISTS SubCategoryGetAll//
CREATE PROCEDURE SubCategoryGetAll
  (IN subcat VARCHAR(100)
 )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin subcategory.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT * FROM coins WHERE coinSubCategory = subcat
    ORDER BY coinName ASC;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS SubCategoryGetCategory//
CREATE PROCEDURE SubCategoryGetCategory
  (IN subcat VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin subcategory category.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT coinCategory FROM coins WHERE coinSubCategory = subcat LIMIT 1;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS SubCategoryGetType//
CREATE PROCEDURE SubCategoryGetType
  (IN subcat VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin subcategory type.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT coinType FROM coins WHERE coinSubCategory = subcat LIMIT 1;
  END//
DELIMITER ;


/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/