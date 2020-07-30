<?php
$dbhost = "localhost";
$dbname = "";
$user = "root";
$pass = "";

try{
   $db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $user, $pass);
}
catch(PDOException $e) {
   echo "error: connect with base of data";
   file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
