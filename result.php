
<?php
    $title = "База пользоваелей";
    require_once "blocks/header.php";
?>
    <h1>База пользователей</h1>
<?php

    $name = "qwe";//$_POST['name'];
    $surname = "rty";//$_POST['surname'];
    $phoneNumber = 123456;//$_POST['phoneNumber'];

    $mysql = new mysqli("localhost", "root", "", $dbname = "dbname");
    $mysql-> query("SET NAMEs 'utf8'");

try {
    $mysql->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $mysql-> query("CREATE TABLE `users` (
  `id` int(20) NOT NULL  AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  PRIMARY KEY (id);
)");

    $mysql->query("INSERT INTO `users`(`name`, `surname`, `phoneNumber`) VALUES ($name,$surname,$phoneNumber");
    $result = $mysql-> query("SELECT * FROM `$dbname` WHERE 1")->fetch_all();

} catch (PDOException $e) {
    throw new Exception($e->getMessage());
}
$mysql-> close();

//    if ($mysql->connect_error) {
//        echo "Error: ".$mysql->connect_error;
//    } else {




    require_once "blocks/footer.php";
?>
