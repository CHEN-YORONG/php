--SELECT 查詢 不會改變原本的資料 顯示出來只有暫存
SELECT `product`.*,`address_book`.`name` 
    FROM `address_book` 
    JOIN `product` 
        ON `product`.`sid` = `address_book`.`sid`



--別名 AS
SELECT p.*,a.`name` 
    FROM `address_book` AS a 
    JOIN `product` AS p  
        ON p.`sid` = a.`sid`


--資料表欄位別名 name那欄變 分類名稱
SELECT p.*,a.`name` AS 分類名稱
    FROM `address_book` AS a 
    INNER JOIN `product` AS p  
        ON p.`sid` = a.`sid`

--LEFT OUTER JOIN
--LEFT: p.`sid` = a.`sid`沒對到 left的資料會全部顯示 右邊的變null
SELECT p.*,a.`name` AS cate_name
    FROM `address_book` AS a 
    LEFT JOIN `product` AS p  
        ON p.`sid` = a.`sid`

--AS 可以省略 +個空白
--取出某欄為空值
SELECT p.*,a.`name` cate_name
    FROM `address_book`  a 
    LEFT JOIN `product`  p  
        ON p.`sid` = a.`sid`
WHERE a.`sid` IS NULL





--
SELECT * FROM `address_book` WHERE `name`='陳小華3'
SELECT * FROM `address_book` WHERE `name`='陳小3'  /* 找不到  = 要完全一樣 */

SELECT * FROM `address_book` WHERE `name` LIKE '%陳%'  /* 一定要加%% */
SELECT * FROM `address_book` WHERE `name` LIKE '陳%'  /* '陳' 一定在最前面 */
SELECT * FROM `address_book` WHERE `name` LIKE '%陳'  /* '陳' 一定在最後面 */

--
SELECT * FROM `address_book` WHERE sid=6 OR sid=2 OR sid=3;

SELECT * FROM `address_book` WHERE sid IN (6,2,3)

SELECT * FROM `address_book` WHERE sid IN (6,2,3) ORDER BY sid DESC;  /* ORDER BY sid DESC 排順序 */

SELECT * FROM `address_book` WHERE sid IN (6,2,3,4,1) ORDER BY RAND() /* 先拿出五筆 再亂數排序 */