/*
|--------------------------------------------------------------------------
| Coin By Metal MySQL Queries
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
*/




/*--------------------------------------------------VIEWS------------------------------------------------------------*/
DROP VIEW IF EXISTS allGold;
CREATE VIEW allGold AS SELECT * FROM `coins` WHERE coinMetal = 'Gold' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allPlatinum;
CREATE VIEW allPlatinum AS SELECT * FROM `coins` WHERE coinMetal = 'Platinum' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allGoldCategories;
CREATE VIEW allGoldCategories AS SELECT DISTINCT coinCategory FROM `coins` WHERE coinMetal = 'Gold' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allPlatinumCategories;
CREATE VIEW allPlatinumCategories AS SELECT DISTINCT coinCategory FROM `coins` WHERE coinMetal = 'Platinum' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allGoldTypes;
CREATE VIEW allGoldTypes AS SELECT DISTINCT coinType FROM `coins` WHERE coinMetal = 'Gold' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allPlatinumTypes;
CREATE VIEW allPlatinumTypes AS SELECT DISTINCT coinType FROM `coins` WHERE coinMetal = 'Platinum' ORDER BY denomination DESC;




/*--------------------------------------------------FUNCTIONS------------------------------------------------------------*/




/*
Total Investments By Category FROM Source

Collection::CategoryUserTotalInvestmentSum()
REPLACE UserTotalInvestmentSumByCategory
*/
DELIMITER //
DROP FUNCTION IF EXISTS categoryGetCoinTypesCount//
CREATE FUNCTION categoryGetCoinTypesCount(p_metal VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE typesCollected INT;

    SELECT COUNT(DISTINCT coins.coinType) INTO typesCollected FROM coins
    WHERE coins.coinMetal = p_metal;

    RETURN typesCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/
DELIMITER //
DROP PROCEDURE IF EXISTS MetalGetAll//
CREATE PROCEDURE MetalGetAll
  (
    IN metal VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin metal.
                MODEL-CoinMetal::getMetalAll().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Metal not found';
    SELECT * FROM coins WHERE coins.coinMetal = metal
    ORDER BY coinName ASC;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS MetalCoinTypes//
CREATE PROCEDURE MetalCoinTypes
  (
    IN metal VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin metals type.
                MODEL-CoinMetal::getMetalTypes().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Metal not found';
    SELECT DISTINCT( coinType ) FROM coins WHERE coins.coinMetal = metal
    ORDER BY denomination ASC;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS MetalCoinCategory//
CREATE PROCEDURE MetalCoinCategory
  (
    IN metal VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin metals category.
                MODEL-CoinMetal::getMetalCategories().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Metal not found';
    SELECT DISTINCT( coinCategory ) FROM coins WHERE coins.coinMetal = metal
    ORDER BY denomination ASC;
  END//
DELIMITER ;

/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/