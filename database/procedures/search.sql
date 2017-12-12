/*
|--------------------------------------------------------------------------
| Coin Search MySQL Queries
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
DROP PROCEDURE IF EXISTS FindSearchItem//
CREATE PROCEDURE FindSearchItem
  (IN searchItem VARCHAR(100)
 )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Search coins for item.
                MODEL-Search::findItem().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Item not found';
    SELECT * FROM coins WHERE coinName LIKE CONCAT('%', searchItem , '%')
    ORDER BY coinName ASC;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS AdvancedSearchItem//
CREATE PROCEDURE AdvancedSearchItem
  (
    IN searchItem VARCHAR(100),
    IN searchCategory VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Search coins for item.
                MODEL-Search::findItem().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Item not found';
    SELECT * FROM coins WHERE coinName LIKE CONCAT('%', searchItem , '%')
    ORDER BY coinName ASC;
  END//
DELIMITER ;

/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/



/*--------------------------------------------------END------------------------------------------------------------*/