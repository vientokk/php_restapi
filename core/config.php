<?php

$servername = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'testdb';

try { 
  $dsn = "mysql:host={$servername};dbname={$dbname}";
  $db = new PDO($dsn, $dbuser, $dbpassword);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo $e->getMessage();
 
}