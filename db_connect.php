
<?php
$db = new PDO('mysql:host=localhost;dbname=thomassons_jensen', 'thomassons_marie', 'marie');		//Databas kopplingen
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 		//Inställningar för error hantering
$db->exec("SET NAMES 'utf8'");										//Teckenkod

?>