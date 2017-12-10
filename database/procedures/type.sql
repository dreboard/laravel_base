/*
|--------------------------------------------------------------------------
| Coin Types MySQL Queries
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
CREATE FUNCTION categoryGetCoinTypesCount(p_type VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE typesCollected INT;

    SELECT coinCategory FROM coins WHERE coinType = p_type;

    RETURN typesCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/

/*
Get Category for this type
TypesController::getThisCategory()
*/
DELIMITER //
DROP PROCEDURE IF EXISTS TypesGetThisCategory//
CREATE PROCEDURE TypesGetThisCategory
  (IN p_type VARCHAR(100))
  BEGIN
    SELECT coinCategory FROM coins WHERE coinType = p_type;
  END//
DELIMITER ;



/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/