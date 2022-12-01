<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'sungla');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$DB_SERVER = 'mysql:dbname=sungla;host=localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = 'abc123';
 
try
{
	$link = new PDO($DB_SERVER,$DB_USERNAME,$DB_PASSWORD);
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error)
{
	echo "PDO error".$error->getMessage();
	die();
}
 
define('PRODUCT_IMG_URL','images/product-images/');
 
?>