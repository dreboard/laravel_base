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
  COMMENT 'Get all collected by coin type'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get coin coinTypeegory.
                MODEL-CoinVersion::getVersion().
  ************************************************************/
  BEGIN
    SELECT * FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE coins.coinType = type AND collection.userID = id
    ORDER BY coins.coinYear ASC;
  END//
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS CoinGetDesignByTypeCollected//
CREATE PROCEDURE CoinGetDesignByTypeCollected
  (
    IN type VARCHAR(100)
  )
  COMMENT ''
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
  COMMENT 'Get design types for type collected'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get design types for type.
                MODEL-CoinType::getDesignTypesList().
  ************************************************************/
  BEGIN
    DECLARE designTypeCount INT(11);
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
  COMMENT 'Get color count for cents by type.'
  /***********************************************************
  Authors Name : Andre Board
  Created Date : 2017-12-01
  Description : Get color count for cents by typee.
                MODEL-CoinType::getDesignTypesList().
  ************************************************************/
  BEGIN
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