/*
|--------------------------------------------------------------------------
| Coin Types Collected MySQL Queries
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
DROP PROCEDURE IF EXISTS CoinTypeGetAllCollected//
CREATE PROCEDURE CoinTypeGetAllCollected
(
    IN type VARCHAR(100),
    IN id INT(100)
)
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin coinTypeegory.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'Collected type not found';
    SELECT * FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE coins.coinType = type AND collection.userID = id
    ORDER BY coins.coinYear ASC;
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
DROP PROCEDURE IF EXISTS CoinGetDesignByTypeCollected//
CREATE PROCEDURE CoinGetDesignByTypeCollected
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
DROP PROCEDURE IF EXISTS CoinGetDesignTypeByCoinTypeCollected//
CREATE PROCEDURE CoinGetDesignTypeByCoinTypeCollected
  (
    IN design VARCHAR(100),
    IN id INT(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get design types for type.
                MODEL-CoinType::getDesignTypesList().
  ************************************************************/
  BEGIN
    DECLARE designTypeCount INT(11);
    #DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'design collected type not found';
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET DIAGNOSTICS CONDITION 1
      @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
      SELECT @p1, @p2;
    END;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET designTypeCount = 0;

    SELECT DISTINCT(coins.designType) AS designType,
      #coinGetDesignTypeByCoinTypeCollectedCount(design, id) AS designTypeCount
      (SELECT COUNT(coins.designType)
       FROM collection
         INNER JOIN coins ON collection.coinID = coins.coinID
       WHERE collection.userID = id
             AND coins.designType = design) AS designTypeCount

    FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE coins.designType = design AND collection.userID = id
    ORDER BY coins.coinYear ASC;

  END//
DELIMITER ;
/*
'Seated Dime No Stars'
SELECT DISTINCT(coins.designType) FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE coins.coinType = 'Seated Liberty Dime' AND collection.userID = 5
    ORDER BY coins.coinYear ASC
    */
DELIMITER //
DROP FUNCTION IF EXISTS coinGetDesignTypeByCoinTypeCollectedCount//
CREATE FUNCTION coinGetDesignTypeByCoinTypeCollectedCount(
  design VARCHAR(20),
  id INT(100)
)
  RETURNS INT

  BEGIN
    DECLARE typesCollected INT;

    SELECT COUNT(coins.designType) INTO typesCollected
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.designType = design;

    IF(typesCollected = 0) THEN
      SET typesCollected = 0;
    END IF;

    RETURN typesCollected;
  END//
DELIMITER ;

/*--------------------------------------------------colors-----------------------------------------*/
DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetColorCountByTypeCollected//
CREATE PROCEDURE CoinGetColorCountByTypeCollected
  (
    IN color VARCHAR(100),
    IN type VARCHAR(100),
    IN id INT(100)
  )
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get design types for type.
                MODEL-CoinType::getDesignTypesList().
  ************************************************************/
  BEGIN
    DECLARE designTypeCount INT(11);
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
      GET DIAGNOSTICS CONDITION 1
      @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
      SELECT @p1, @p2;
    END;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET designTypeCount = 0;

    SELECT COUNT(*) FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id AND coins.coinType = type
          AND collection.color = color;
  END//
DELIMITER ;
/*--------------------------------------------------cointypes table-----------------------------------------*/





/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/

# getTypeByYear





/*--------------------------------------------------END------------------------------------------------------------*/