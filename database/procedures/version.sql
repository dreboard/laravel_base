/*
|--------------------------------------------------------------------------
| Coin Version MySQL Queries
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
DROP FUNCTION IF EXISTS versionGetCount//
CREATE FUNCTION versionGetCount(version VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE versionsCollected INT;

    SELECT COUNT(DISTINCT coins.coinVersion) INTO versionsCollected FROM coins
    WHERE coins.coinVersion = version;

    RETURN versionsCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/

DELIMITER //
DROP PROCEDURE IF EXISTS VersionGetAll//
CREATE PROCEDURE VersionGetAll
  (IN version VARCHAR(100)
 )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin version.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT * FROM coins WHERE coinSubCategory = version
    ORDER BY coinName ASC;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS VersionGetCategory//
CREATE PROCEDURE VersionGetCategory
  (IN version VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin versions category.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT coinCategory FROM coins WHERE coinVersion = version LIMIT 1;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS VersionGetType//
CREATE PROCEDURE VersionGetType
  (IN version VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin versions type.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT coinType FROM coins WHERE coinVersion = version LIMIT 1;
  END//
DELIMITER ;


/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/