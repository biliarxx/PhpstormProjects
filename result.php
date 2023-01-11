
<?php
    $title = "База пользоваелей";
    require_once "blocks/header.php";
?>
    <h1>База пользователей</h1>
<?php

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phoneNumber = $_POST['phoneNumber'];

try {
    $mysql = new mysqli("localhost", "root", "", $dbname = "dbname");
    $mysql-> query("SET NAMEs 'utf8'");

    $mysql->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $mysql-> query("CREATE TABLE `users` (
  `id` int(20) NOT NULL  AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  PRIMARY KEY (id);
)");

    $mysql->query("INSERT INTO `users`(`name`, `surname`, `phoneNumber`) VALUES ($name,$surname,$phoneNumber");
    $results = $mysql-> query("SELECT * FROM `$dbname`")->fetch_all(MYSQLI_ASSOC);
    foreach ($results as $result) {
        printf("%s %s\n %d\n", $result["name"], $result["surname"], $result["phoneNumber"]);
    }
    $mysql-> close();
} catch (PDOException $e) {
    throw new Exception($e->getMessage());
}

//    if ($mysql->connect_error) {
//        echo "Error: ".$mysql->connect_error;
//    } else {

    require_once "blocks/footer.php";
?>
