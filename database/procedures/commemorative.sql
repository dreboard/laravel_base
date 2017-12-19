/*
|--------------------------------------------------------------------------
| Coin commemorative MySQL Queries
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
*/




/*--------------------------------------------------VIEWS------------------------------------------------------------*/
DROP VIEW IF EXISTS commemorativeCategoriesView;
CREATE VIEW commemorativeCategoriesView AS SELECT DISTINCT coinCategory FROM coins WHERE commemorative = 1 ORDER BY denomination DESC;

DROP VIEW IF EXISTS commemorativeTypesView;
CREATE VIEW commemorativeTypesView AS SELECT DISTINCT coinType FROM coins WHERE commemorative = 1 ORDER BY denomination DESC;


SELECT commemorativeVersion FROM `coins` ORDER BY `coins`.`commemorativeVersion` ASC;
SELECT * FROM `coins` WHERE `coinType` = 'First Spouse' ORDER BY `coinType` ASC;

/*--------------------------------------------------FUNCTIONS------------------------------------------------------------*/






/*--------------------------------------------------PROCEDURES------------------------------------------------------------*/
/***********************************************************
Authors Name : Andre Board
Created Date : 2017-12-01
Description : Get coin category.
              MODEL-Commemorative::getAll().
************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CommemorativeGetAll//
CREATE PROCEDURE CommemorativeGetAll()

  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'commemoratives not found';
    SELECT * FROM coins WHERE coins.commemorative = 1
    ORDER BY denomination DESC;
  END//
DELIMITER ;

/***********************************************************
Authors Name : Andre Board
Created Date : 2017-12-01
Description : Get all commemorative coin types.
              MODEL-Commemorative::getAllTypes().
************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CommemorativeGetTypes//
CREATE PROCEDURE CommemorativeGetTypes()

  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'commemoratives not found';
    SELECT * FROM commemorativeTypesView;
  END//
DELIMITER ;

/***********************************************************
Authors Name : Andre Board
Created Date : 2017-12-01
Description : Get all commemorative coin categories.
              MODEL-Commemorative::getAll().
************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CommemorativeGetCats//
CREATE PROCEDURE CommemorativeGetCats()

  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'commemoratives not found';
    SELECT * FROM commemorativeCategoriesView;
  END//
DELIMITER ;

/***********************************************************
Authors Name : Andre Board
Created Date : 2017-12-01
Description : Get all commemorative coin types.
              MODEL-Commemorative::getAllTypes().
************************************************************/
DELIMITER //
DROP PROCEDURE IF EXISTS CommemorativeGetVersionTypes//
CREATE PROCEDURE CommemorativeGetVersionTypes
  (
    IN type VARCHAR(100)
  )

  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION SELECT 'commemoratives not found';
    SELECT coinVersion FROM coins WHERE coinType = type ORDER BY denomination DESC;
  END//
DELIMITER ;
/*--------------------------------------------------TRIGGERS------------------------------------------------------------*/







/*--------------------------------------------------END------------------------------------------------------------*/