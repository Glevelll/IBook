CREATE DEFINER=`root`@`localhost` TRIGGER `check_email` BEFORE INSERT ON `user_params` FOR EACH ROW BEGIN
    IF (NEW.email REGEXP '^[a-zA-Z0-9._%+-]+@(mail.ru|gmail.com|yandex.ru)$') THEN
        SET NEW.email = NEW.email;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid email';
    END IF;
END
