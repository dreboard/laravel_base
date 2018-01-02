/*
|--------------------------------------------------------------------------
| Coin By Strike MySQL Queries
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
*/




/*--------------------------------------------------VIEWS------------------------------------------------------------*/
DROP VIEW IF EXISTS allProof;
CREATE VIEW allProof AS SELECT * FROM `coins` WHERE strike = 'Proof' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allBusiness;
CREATE VIEW allBusiness AS SELECT * FROM `coins` WHERE strike = 'Business' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allProofCategories;
CREATE VIEW allProofCategories AS SELECT DISTINCT coinCategory FROM `coins` WHERE strike = 'Proof' ORDER BY denomination DESC;

DROP VIEW IF EXISTS allProofTypes;
CREATE VIEW allProofTypes AS SELECT DISTINCT coinType FROM `coins` WHERE strike = 'Proof' ORDER BY denomination DESC;



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

    CASE metal
      WHEN  'Silver' THEN
      SELECT * FROM coins WHERE coins.coinMetal = metal
      AND commemorative = '1'
      ORDER BY coinName ASC;
    ELSE
      SELECT * FROM coins WHERE coins.coinMetal = metal
      ORDER BY coinName ASC;
    END CASE;

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

    CASE metal
      WHEN  'Silver' THEN
      SELECT DISTINCT( coinType ) FROM coins WHERE coins.coinMetal = metal AND commemorative = '1' ORDER BY denomination ASC;
    ELSE
      SELECT DISTINCT( coinType ) FROM coins WHERE coins.coinMetal = metal ORDER BY denomination ASC;
    END CASE;

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
    CASE metal
      WHEN  'Silver' THEN
      SELECT DISTINCT( coinCategory ) FROM coins WHERE coins.coinMetal = metal AND commemorative = '1' ORDER BY denomination ASC;
    ELSE
      SELECT DISTINCT( coinCategory ) FROM coins WHERE coins.coinMetal = metal ORDER BY denomination ASC;
    END CASE;

  END//
DELIMITER ;

/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/