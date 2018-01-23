/*
|--------------------------------------------------------------------------
| Coin Categories MySQL Queries
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
*/




/*--------------------------------------------------VIEWS------------------------------------------------------------*/

/*--------------------------------------------------FUNCTIONS------------------------------------------------------------*/





/*
Total Investments By Category FROM Source

Collection::CategoryUserTotalInvestmentSum()
REPLACE UserTotalInvestmentSumByCategory
*/
DELIMITER //
DROP FUNCTION IF EXISTS categoryGetCoinTypesCount//
CREATE FUNCTION categoryGetCoinTypesCount(p_cat VARCHAR(20)) RETURNS INT
  BEGIN
    DECLARE typesCollected INT;
    SELECT COUNT(DISTINCT coins.coinType) INTO typesCollected FROM coins
    WHERE coins.coinCategory = p_cat;
    RETURN typesCollected;
  END//
DELIMITER ;

/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/
/*
Get all Category details
CoinCategory::getCategoryDetails()
*/


/***********************************************************
 Authors Name : Andre Board
 Created Date : 2017-12-01
 Description : Save users coin.
               CoinCategory::categoryLastCountByUser().
 ************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CollectionSaveCoin//
CREATE PROCEDURE CollectionSaveCoin
  (
    IN user INT(10),
    IN id  INT(100),
    IN coinNickname VARCHAR(50),
    IN coinGrade VARCHAR(50),
    IN coinGradeNum INT(2),
    IN designation VARCHAR(100),
    IN pcgsVariety VARCHAR(55),
    IN purchaseFrom VARCHAR(255),
    IN purchaseDate DATE,
    IN purchasePrice DECIMAL(10,2),
    IN coinValue DECIMAL(10,2),
    IN ebaySellerID VARCHAR(255),
    IN shopName VARCHAR(255),
    IN shopUrl VARCHAR(255)



  )
  COMMENT 'Save users coin.'
  BEGIN
    INSERT INTO collection
    (
      userID,
     coinID,
     coinNickname,
      coinGrade,
      coinGradeNum,
      designation,
      pcgsVariety,
      purchaseFrom,
      purchaseDate,
      purchasePrice,
      coinValue,
      ebaySellerID,
      shopName,
      shopUrl,


      proService,
     proSerialNumber,
     slabCondition,

     slabLabel,
     coinGrade,
     coinGradeNum,
     designation,
     problem,
     coinValue,


     auctionNumber,
     additional,

     ebaySellerID,
     shopName,
     shopUrl,
     coinNote,
     enterDate,
     userID,
     errorCoin,
     mintBox,
     showName,
     showCity,
     color,
     fullAtt,
     morganDesignation,
     dieCrack,
     bie,
     wddo,
     ddo,
     wddr,
     ddr,
     coincollectID,
     coinLotID
    )
    VALUES
      (user,
       id,
       coinNickname,
       coinGrade,
       coinGradeNum,
       designation,
       pcgsVariety,
       purchaseFrom,
       purchaseDate,

       purchasePrice,
       coinValue,
        ebaySellerID,
        shopName,
        shopUrl,




        coinGradeNum,
       designation,
       pcgsVariety,
       purchaseFrom,
       purchaseDate,
       coinNickname,
       coinGrade,
       coinGradeNum,
       designation,
       pcgsVariety,
       purchaseFrom,
       purchaseDate,
      );



    SELECT * FROM collection
      INNER JOIN coins ON coins.coinID = collection.coinID
    WHERE collection.collectionID = collectID AND collection.userID = id;

  END //
DELIMITER ;




/***********************************************************
 Authors Name : Andre Board
 Created Date : 2017-12-01
 Description : Get all Category Distinct Types Counts.
               CoinCategory::categoryLastCountByUser().
 ************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CollectionGetCoin//
CREATE PROCEDURE CollectionGetCoin
  (
    IN collectID VARCHAR(50),
    IN id  INT(10)

  )
  COMMENT 'Get coins with same year, type and mint mark.'
  BEGIN
    SELECT * FROM collection
      INNER JOIN coins ON coins.coinID = collection.coinID
    WHERE collection.collectionID = collectID AND collection.userID = id;

  END //
DELIMITER ;

/***********************************************************
 Authors Name : Andre Board
 Created Date : 2017-12-01
 Description : Get all Category Distinct Types Counts.
               CoinCategory::categoryLastCountByUser().
 ************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CollectionGetCoinsByID//
CREATE PROCEDURE CollectionGetCoinsByID
  (
    IN coin INT(10),
    IN id  INT(10)

  )
  COMMENT 'Get coins with same coinID.'
  BEGIN
    DECLARE CONTINUE HANDLER FOR SQLWARNING BEGIN END;
    SELECT * FROM collection
      INNER JOIN coins ON coins.coinID = collection.coinID
    WHERE collection.coinID = coin AND collection.userID = id;

  END //
DELIMITER ;



DELIMITER //
DROP PROCEDURE IF EXISTS CategoryUserTotalInvestmentSumAll//
CREATE PROCEDURE CategoryUserTotalInvestmentSumAll
  (IN id INT,
   IN cat VARCHAR(100)
)
  COMMENT 'Get total investment by category'
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get total investment by category.
                 CoinCategory::CategoryUserTotalInvestmentSumAll().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00) AS catCount
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.coinCategory = cat;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CategoryUserTotalInvestmentSumFrom//
CREATE PROCEDURE CategoryUserTotalInvestmentSumFrom
  (IN id INT,
   IN cat VARCHAR(100),
   IN purchaseFrom VARCHAR(100)
)
  COMMENT 'Total Investments By Category FROM Source'
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Total Investments By Category FROM Source.
                 CoinCategory::CategoryUserTotalInvestmentSumFrom().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00)
    FROM collection
    INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
    AND coins.coinCategory = cat
    AND collection.purchaseFrom = purchaseFrom;
  END//
DELIMITER ;


DELIMITER //
DROP PROCEDURE IF EXISTS CollectionUpdateCleanedCoin//
CREATE PROCEDURE CollectionUpdateCleanedCoin
  (IN id INT,
   IN val INT(1),
   IN user INT(1)
  )
  COMMENT ''
  /***********************************************************
   Authors Name : Andre Board
   Created Date : 2017-12-01
   Description : Get all Category Distinct Types Counts.
                 CoinCategory::CategoryUserTotalInvestmentSumAll().
   ************************************************************/
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT '0';
    SELECT COALESCE(sum(purchasePrice), 0.00) AS catCount
    FROM collection
      INNER JOIN coins ON collection.coinID = coins.coinID
    WHERE collection.userID = id
          AND coins.coinCategory = cat;
  END//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS CollectionUpdateCoinDetails//
CREATE PROCEDURE CollectionUpdateCoinDetails(
  IN val INT(1),
  IN col CHAR(64),
  IN userID INT(10),
  IN coin INT(100)
)
  BEGIN
    SET @s = CONCAT('UPDATE collection SET ', col, '=', val, 'WHERE userID = ', userID, 'AND collectionID = ',coin);
    #SET @s = CONCAT('SELECT ',col,' FROM ',tbl );
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
  END
//
delimiter ;

DELIMITER //
DROP PROCEDURE IF EXISTS CollectionUpdateCoinDamage//
CREATE PROCEDURE CollectionUpdateCoinDamage(
  IN holed INT(1),
  IN cleaned INT(1),
  IN altered INT(1),
  IN damaged INT(1),
  IN pvc INT(1),
  IN corrosion INT(1),
  IN bent INT(1),
  IN plugged INT(1),
  IN polished INT(1),
  IN coin INT(100),
  IN id INT(100)
)
  BEGIN
    UPDATE collection
    SET
      collection.holed  = holed,
      collection.cleaned  = cleaned,
      collection.altered  = altered,
      collection.damaged  = damaged,
      collection.pvc  = pvc,
      collection.corrosion  = corrosion,
      collection.bent  = bent,
      collection.plugged  = plugged,
      collection.polished  = polished
    WHERE collection.collectionID = coin AND collection.userID = id;
  END
//
delimiter ;
/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/