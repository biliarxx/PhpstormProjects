
<?php
    $title = "База пользоваелей";
    require_once "blocks/header.php";
?>
    <h1>База пользователей</h1>
<?php

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phoneNumber = $_POST['phoneNumber'];

    $mysql = new mysqli("localhost", "root", "");
    $mysql-> query("SET NAMEs 'utf8'");

    if ($mysql->connect_error) {
        echo "Error: ".$mysql->connect_error;
    } else {
        $mysql-> query("CREATE TABLE `users` (
  `id` int(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phoneNumber` int(11) NOT NULL
)");
    }

    $mysql->query("INSERT INTO `users`(`name` , `surname`, `phoneNumber`)
    VALUES ('$name', '$surname', '$phoneNumber')");

    $mysql-> close();


    require_once "blocks/footer.php";
?>
