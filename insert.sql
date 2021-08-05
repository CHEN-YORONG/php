CRUD:
created
read
UPdate
delete






INSERT INTO
    `address_book`
(`sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
VALUES
(NULL, '陳小華3', 'shin3@ggg.com', '0918123456', '1999-07-01', '台南市', '2021-07-28 04:13:15'),
(NULL, '陳小華4', 'shin4@ggg.com', '0918123456', '1999-07-01', '台南市', '2021-07-28 04:13:15'),
(NULL, '陳小華5', 'shin5@ggg.com', '0918123456', '1999-07-01', '台南市', '2021-07-28 04:13:15'),
(NULL, '陳小華6', 'shin6@ggg.com', '0918123456', '1999-07-01', '台南市', '2021-07-28 04:13:15')


-- mysql註解
UPDATE `address_book` SET `mobile` = '02-66584144' WHERE `address_book`.`sid` = 8;

UPDATE `address_book` SET `mobile` = '02-66584144'
-- 沒有WHERE 指定 會所有都改 迴圈的概念*/

UPDATE `address_book` SET 
`email` = 'sdass@fsds.com',
`bithday` = '2010-07-11' 
WHERE `address_book`.`sid` = 6;


DELETE FROM `address_book` WHERE `address_book`.`sid` = 4


IPV4
127.0.0.1


IPV6
::1




CREATE USER 'chen1'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'chen1'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;