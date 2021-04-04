CREATE TABLE `inventorscloud`.`ic_users` ( 
    `id` SMALLINT NOT NULL AUTO_INCREMENT , 
    `user_name` TINYTEXT NOT NULL , 
    `user_password` TEXT NOT NULL , 
    `user_rank` INT NOT NULL , 
    `user_lastTimeSeen` TIMESTAMP NOT NULL , 
    `user_currentlyOnline` BOOLEAN NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;