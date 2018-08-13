<?php
$driver = 'mysql';
$host = 'localhost';
$db_name = 'site';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try{
	$pdo = new PDO("$driver:host=$host; dbname=$db_name; charset=$charset", $db_user, $db_pass, $option);
	session_start();
}catch(PDOException $e){
	die("Не могу подключиться к базе данных");
}