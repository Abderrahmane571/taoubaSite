<?php
$hostname='localhost';
$username='root';
$password='';

try {
    $connect = new PDO("mysql:host=$hostname;dbname=taouba_site_new",$username,$password);
	$connect->exec("set names utf8");
 
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>