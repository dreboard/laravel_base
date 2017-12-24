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



/*--------------------------------------------------FUNCTIONS------------------------------------------------------------*/



/*####################################################################################################################################*/
/*-------------------------------------------------------------PROCEDURES------------------------------------------------------------*/
/*####################################################################################################################################*/



/*--------------------------------------------------BY Type-----------------------------------------*/
DELIMITER //
DROP PROCEDURE IF EXISTS CoinTypeGetAll//
CREATE PROCEDURE CoinTypeGetAll
  (IN type VARCHAR(100)
)
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin coinTypeegory.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Type not found';
    SELECT * FROM coins WHERE coinType = type
    ORDER BY coinSubCategory ASC;

    #SELECT * FROM (SELECT * FROM coins c1 WHERE c1.coinType = type ORDER BY c1.coinYear DESC) coins GROUP BY coins.coinSubCategory;

  END//
DELIMITER ;


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


DELIMITER //
DROP PROCEDURE IF EXISTS CoinTypeDistinctYears//
CREATE PROCEDURE CoinTypeDistinctYears
  (
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get years minted for type.
                MODEL-CoinType::getYearList().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'dates not found';
    SELECT DISTINCT(coinYear) FROM `coins` WHERE `coinType` = type ORDER BY coinYear ASC;
  END//
DELIMITER ;
/*--------------------------------------------------cointypes table-----------------------------------------*/

DELIMITER //
DROP PROCEDURE IF EXISTS CoinTypeYears//
CREATE PROCEDURE CoinTypeYears
  (
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get years minted for type.
                MODEL-CoinType::getYearList().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'dates not found';
    SELECT dates FROM cointypes
    WHERE coinType = type;
  END//
DELIMITER ;



/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/

# getTypeByYear





/*--------------------------------------------------END------------------------------------------------------------*/