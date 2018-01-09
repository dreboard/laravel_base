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
    SELECT * FROM coins WHERE coinType = type AND coins.coinYear <= YEAR(CURDATE())
    ORDER BY coinYear DESC;
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


DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetDesignByType//
CREATE PROCEDURE CoinGetDesignByType
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
    SELECT DISTINCT(design) FROM `coins` WHERE design <> 'none' AND coinType = type;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetDesignTypeByCoinType//
CREATE PROCEDURE CoinGetDesignTypeByCoinType
  (
    IN type VARCHAR(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get design types for type.
                MODEL-CoinType::getDesignTypesList().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'design type not found';
    SELECT DISTINCT(designType) FROM `coins` WHERE coinType = type;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CoinTypeLastFiveByUser//
CREATE PROCEDURE CoinTypeLastFiveByUser
  (
    IN type VARCHAR(50),
    IN id  INT(10)
  )
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get last five type collected by user.
                 CoinCategory::categoryLastCountByUser().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET DIAGNOSTICS CONDITION 1
      @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
      SELECT @p1, @p2;
    END;

    SELECT * FROM collection
      INNER JOIN coins ON coins.coinID = collection.coinID
    WHERE coins.coinType = type AND collection.userID = id
    ORDER BY collection.enterDate DESC
    LIMIT 5;
  END //
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