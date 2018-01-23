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
DROP VIEW IF EXISTS distinctTypesView;
CREATE VIEW distinctTypesView AS SELECT DISTINCT coinType FROM `coins` ORDER BY denomination DESC;



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
  COMMENT 'Get all coin Type coins'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get all coin Type coins.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    SELECT * FROM coins WHERE coinType = type AND coins.coinYear <= YEAR(CURDATE())
    ORDER BY coinYear DESC;
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
  COMMENT 'Get category from coin Type'
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
  COMMENT 'Get all coin Type years minted'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get years minted for type.
                MODEL-CoinType::getYearList().
  ************************************************************/
  BEGIN
    SELECT DISTINCT(coinYear) FROM `coins` WHERE `coinType` = type ORDER BY coinYear ASC;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetDesignByType//
CREATE PROCEDURE CoinGetDesignByType
  (
    IN type VARCHAR(100)
  )
  COMMENT 'Get design by coin Type'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get design by coin Type.
                MODEL-CoinType::getYearList().
  ************************************************************/
  BEGIN
    SELECT DISTINCT(design) FROM `coins` WHERE design <> 'none' AND coinType = type;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetDesignTypeByCoinType//
CREATE PROCEDURE CoinGetDesignTypeByCoinType
  (
    IN type VARCHAR(100)
  )
  COMMENT 'Get design types by coin Type'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get design types for type.
                MODEL-CoinType::getDesignTypesList().
  ************************************************************/
  BEGIN
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
  COMMENT 'Get last 5 collected by coin Type'
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get last five type collected by user.
                 CoinCategory::categoryLastCountByUser().
   ************************************************************/
  BEGIN
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
  COMMENT 'Get years minted for type'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get years minted for type.
                MODEL-CoinType::getYearList().
  ************************************************************/
  BEGIN
    SELECT dates FROM cointypes
    WHERE coinType = type;
  END//
DELIMITER ;



/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/

# getTypeByYear





/*--------------------------------------------------END------------------------------------------------------------*/
DROP VIEW IF EXISTS distinctTypesView;
CREATE VIEW distinctTypesView AS SELECT DISTINCT coins.coinType FROM coins ORDER BY denomination DESC;

DELIMITER //
DROP FUNCTION IF EXISTS categoryGetCoinTypesCount//
CREATE FUNCTION categoryGetCoinTypesCount(p_cat VARCHAR(20)) RETURNS INT

  BEGIN
    DECLARE types VARCHAR(30);
    SELECT COUNT(DISTINCT coins.coinType) INTO types FROM coins
    WHERE coins.coinCategory = p_cat;

    RETURN types;
  END//
DELIMITER ;

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
    SELECT DISTINCT coins.coinType FROM coins
    WHERE coinType = type;
  END//
DELIMITER ;















-- end
