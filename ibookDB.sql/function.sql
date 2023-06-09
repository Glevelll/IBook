CREATE DEFINER=`root`@`localhost` FUNCTION `get_table_counts`() RETURNS varchar(255) CHARSET utf8mb4
    READS SQL DATA
    DETERMINISTIC
BEGIN
     DECLARE userr_count INT;
     DECLARE zakaz_count INT;
     DECLARE user_params_count INT;
     SELECT COUNT(*) INTO userr_count FROM userr;
     SELECT COUNT(*) INTO zakaz_count FROM zakaz;
     SELECT COUNT(DISTINCT city) INTO user_params_count FROM user_params;
     RETURN CONCAT('userr count: ', userr_count, '\n', 'zakaz count: ', zakaz_count, '\n', 'user_params count: ', user_params_count);
END