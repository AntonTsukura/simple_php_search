<?php
$dbhost = "localhost";
$dbname = "";
$user = "root";
$pass = "";

try{
   $db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $user, $pass);
}
catch(PDOException $e) {
   echo "Возникли некоторые проблемы в подключении базы данных... Да и зачем вам всё это? Лучше займитесь любимым делом.";
   file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}
