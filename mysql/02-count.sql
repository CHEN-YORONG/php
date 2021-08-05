SELECT COUNT(*) FROM `products`

SELECT COUNT(sid) FROM `products`

SELECT COUNT(1) FROM `products`

--
SELECT * FROM `product` WHERE sid IN (1,2)


/*  SUM :總和  */
SELECT SUM(`price`) FROM `product` WHERE sid IN (1,2)
/*價錢 相加 */


--GROUP BY 群組

SELECT `sid`, COUNT(1) num FROM `product` GROUP BY `sid`
SELECT *, COUNT(1) num FROM `product` GROUP BY `sid`