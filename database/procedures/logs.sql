/*
Master logs
*/


DROP TABLE IF EXISTS db_log;
CREATE TABLE IF NOT EXISTS db_log (
  id INT(100) PRIMARY KEY AUTO_INCREMENT,
  log_type VARCHAR(20) NOT NULL DEFAULT 'General' COMMENT'Log errors and track users',
  log_message TEXT NOT NULL COMMENT 'Log errors and track users',
  log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  user_id INT(100) NOT NULL DEFAULT 0
)
  ENGINE=InnoDB
  COMMENT 'Log errors and track users';

DELIMITER //
DROP PROCEDURE IF EXISTS log_msg//
CREATE DEFINER = CURRENT_USER PROCEDURE log_msg(
  p_type VARCHAR(20),
  p_msg TEXT,
  p_user INT(100)
)
CONTAINS SQL
MODIFIES SQL DATA
  COMMENT 'Log errors and track users'
  BEGIN
    INSERT INTO db_log(log_type, log_message, user_id) VALUES(p_type, p_msg, p_user);
  END;
DELIMITER ;

CALL log_msg('General', 'Some message',1);
CALL log_msg('Error', 'Log an error', 1);
SELECT * FROM db_log;