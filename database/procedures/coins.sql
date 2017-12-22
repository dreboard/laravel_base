



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
DROP PROCEDURE IF EXISTS CoinGetAllFromYear//
CREATE PROCEDURE CoinGetAllFromYear
  (IN cy INT
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins for this year.
                MODEL-CoinVersion::getVersion().
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
    IN cy INT,
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coins for this year.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Details not found';
    SELECT * FROM coins
    WHERE coins.coinYear = cy AND coins.coinType = type
    ORDER BY coinName ASC;
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