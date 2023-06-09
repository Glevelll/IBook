CREATE DEFINER=`root`@`localhost` TRIGGER `check_phone` BEFORE INSERT ON `user_params` FOR EACH ROW BEGIN
    IF (NEW.phone REGEXP '^\\+7[0-9]{10}$' OR NEW.phone REGEXP '^8[0-9]{10}$') THEN
        SET NEW.phone = NEW.phone;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid phone number';
    END IF;
END
