
/*
Series
SELECT DISTINCT(series) FROM `coins` WHERE series <> 'none' ORDER BY `coins`.`series` DESC

Special Mint
Bicentennia
-------------------------------------------
design
SELECT DISTINCT(design) FROM `coins` WHERE design <> 'none' ORDER BY `coins`.`design` DESC
SELECT * FROM `coins` WHERE `coinType` LIKE 'Flowing Hair Half Dime' ORDER BY `coins`.`design` ASC




 */




/*--------------------------------------------------VIEWS------------------------------------------------------------*/
/***********************************************************
Authors Name : Andre Board
Created Date : 2017-12-01
Description : Get lincoln wheat BIE id's.
              Collection::CategoryUserTotalInvestmentSum().
************************************************************/
CREATE OR REPLACE VIEW lincolnWheatBieCoinsView AS
  SELECT *
  FROM coins
  WHERE coins.coinID
        IN('7117', '7173', '7116', '7174', '7113', '7114', '7115', '7175', '7176', '7177', '7178', '7179', '7180', '7181', '7182', '7183', '7184', '7185', '7187', '7188', '7189', '7171', '7172')
  ORDER BY coins.coinYear DESC;





/*-----------------------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------FUNCTIONS------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------PROCEDURES------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------------------------------*/



/*-------------------------------------------------------------BY ID------------------------------------------------------------*/
DELIMITER //
DROP PROCEDURE IF EXISTS CoinsGetByID//
CREATE PROCEDURE CoinsGetByID
  (IN p_id INT)
  BEGIN
    SELECT * FROM coins WHERE coinID = p_id;
  END//
DELIMITER ;


/*-------------------------------------------------------------BY YEAR------------------------------------------------------------*/

DELIMITER //
DROP PROCEDURE IF EXISTS CoinTypeYearList//
CREATE PROCEDURE CoinTypeYearList
  (
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin type minted years.
                MODEL-Coins::yearMintMarks().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT DISTINCT(coinYear) FROM coins
    WHERE coins.coinType = type
    ORDER BY coins.coinYear DESC;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetAllFromYear//
CREATE PROCEDURE CoinGetAllFromYear
  (IN cy INT
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins for this year.
                MODEL-Coin::getAllFromYear().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT coinID, coinName, coinType, coinYear FROM coins WHERE coins.coinYear = cy
    ORDER BY denomination ASC;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CoinTypeAllFromYear//
CREATE PROCEDURE CoinTypeAllFromYear
  (
    IN cy VARCHAR(100),
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins type coins for this year.
                MODEL-CoinType::getYearCoinType().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT * FROM coins
    WHERE coins.coinYear = cy AND coins.coinType = type
    ORDER BY coinName ASC;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetAllFromCentury//
CREATE PROCEDURE CoinGetAllFromCentury
  (IN cent INT)
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins for this century.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    SELECT * FROM coins WHERE century = cent;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetCatFromCentury//
CREATE PROCEDURE CoinGetCatFromCentury
  (IN cent INT)
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins for this century.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    SELECT DISTINCT(coins.coinCategory) FROM coins WHERE century = cent
    ORDER BY denomination DESC;
  END//
DELIMITER ;

/*-------------------------------------------------------------BY MINT MARK------------------------------------------------------------*/

DELIMITER //
DROP PROCEDURE IF EXISTS CoinMintMarksFromYear//
CREATE PROCEDURE CoinMintMarksFromYear
  (
    IN cy INT,
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins for this year.
                MODEL-Coins::yearMintMarks().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT DISTINCT(mintMark) FROM coins
    WHERE coins.coinYear = cy AND coins.coinType = type;
  END//
DELIMITER ;

/*-------------------------------------------------------------BY SUBCATEGORY------------------------------------------------------------*/
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
DROP PROCEDURE IF EXISTS CoinsGetBieCoins//
CREATE PROCEDURE CoinsGetBieCoins
  (IN cat VARCHAR(100))
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get lincoln wheat BIE id's.
                Collection::CategoryUserTotalInvestmentSum().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT *
    FROM lincolnWheatBieCoinsView;
  END//
DELIMITER ;


