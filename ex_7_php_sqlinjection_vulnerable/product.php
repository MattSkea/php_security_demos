<?php

/*
 * id=1 or 1=1
 * id=2%2b2
 * 
 * id=0 order by 1
 * id=0 union select 1,2,user(),@@version
 * id=0 union select 1,2,3,group_concat(column_name) from information_schema.columns where table_schema=database()
 * id=0 union select 1,2,3,sleep(10)
 */
    include "database.php";
    
function getItem()
{	
        $sql_query="select * from security.items where id=".$_GET["id"];
//       echo $sql_query."<br>";

        $results = mysql_query($sql_query);

        while ($row=mysql_fetch_array($results))
        {
            echo "product: ".$row[1]."<br>  price: ".$row[2]."$<br> color: ".$row[3]."<br>";
        }
}

function listItems()
{
		$orderby="";
		if(!empty($_GET["orderby"]))
			$orderby=" order by ". $_GET["orderby"];
			
        $sql_query="select * from security.items ".$orderby;
//        echo $sql_query."<br>";

        $results = mysql_query($sql_query);
		echo "<table border=1><tr><th><a href='?orderby=product'>Product</a></th><th><a href='?orderby=price'>Price</a></th></tr>";
        while ($row=mysql_fetch_array($results))
        {
            echo "<tr><td><a href='?id=".$row[0]."'>".$row[1]."</a></td><td>".$row[2]."</td></tr>";
        }
		echo "<table>";
}        

        
if(empty($_GET["id"]))
	listItems();
else
	getItem();
	
	
/*

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Data dump for tabellen `items`
--

INSERT INTO `items` (`id`, `product`, `price`, `color`) VALUES
(1, 'iphone 3', '99', 'Black'),
(2, 'iphone 3g', '149', 'Black'),
(3, 'iphone 3gs', '199', 'Black'),
(4, 'iphone 4', '249', 'Black'),
(5, 'iphone 4s', '299', 'Black'),
(6, 'iphone 5', '349', 'Black/White'),
(7, 'iphone 5s', '399', 'White/Red/Yellow'),
(8, 'samsung galaxy', '250', 'Black'),
(9, 'HTC magic', '150', 'white');
*/	
?>
