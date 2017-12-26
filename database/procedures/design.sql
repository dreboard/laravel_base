/*
|--------------------------------------------------------------------------
| Coin Design and Design type MySQL Queries
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
DROP FUNCTION IF EXISTS designGetCount//
CREATE FUNCTION designGetCount(design VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE designsCollected INT;

    SELECT COUNT(DISTINCT coins.coinVersion) INTO designsCollected FROM coins
    WHERE coins.coinVersion = design;

    RETURN designsCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/

DELIMITER //
DROP PROCEDURE IF EXISTS DesignGetAll//
CREATE PROCEDURE DesignGetAll
  (
    IN design VARCHAR(100)
 )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin design.
                MODEL-CoinDesign::getDesign().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Design not found';
    SELECT * FROM coins WHERE coins.design = design
    ORDER BY coinName ASC;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS DesignTypeGetAll//
CREATE PROCEDURE DesignTypeGetAll
  (
    IN dt VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin design type.
                MODEL-CoinDesign::getDesign().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Design type not found';
    SELECT * FROM coins WHERE coins.designType = dt AND coins.designType != 'None'
    ORDER BY coinName ASC;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS DesignCoinTypes//
CREATE PROCEDURE DesignCoinTypes
  (
    IN design VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin designs type.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Design not found';
    SELECT DISTINCT( coinType ) FROM coins WHERE coins.design = design
    ORDER BY denomination ASC;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS DesignCoinCategory//
CREATE PROCEDURE DesignCoinCategory
  (
    IN design VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin designs category.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Design not found';
    SELECT DISTINCT( coinCategory ) FROM coins WHERE coins.design = design
    ORDER BY denomination ASC;
  END//
DELIMITER ;


/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/