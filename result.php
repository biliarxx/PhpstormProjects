
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
    $connection = new mysqli('localhost','root','');
    if ($connection->connect_errno){
        throw new Exception($connection->connect_error);
    } else {
        echo "22222<br>";
//        $sql = "CREATE DATABASE testdb3";
        $sqlDataBase = "CREATE DATABASE dbname";
      }
    if ($connection->query($sqlDataBase)) {
            echo "База данных успешно создана";
            $sqlTable = "CREATE TABLE users (id int(20) NOT NULL  AUTO_INCREMENT, 
             name varchar(255) NOT NULL, 
             surname varchar(255) NOT NULL, 
             phoneNumber int(11) NOT NULL, 
              PRIMARY KEY (id);)";
            $sqlTable = "INSERT INTO `users`(`name`, `surname`, `phoneNumber`) VALUES ($name,$surname,$phoneNumber)";
            $results = $connection -> query("SELECT * FROM dbname")->fetch_all(MYSQLI_ASSOC);
            foreach ($results as $result) {
                echo "<pre>";
                print_r($result);
                echo "result name";
                echo "</pre>";
            } if ($connection->connect_error) {
                echo "Ошибка: " . $connection->error;
            }
        }
} catch (Exception $e) {
    echo $e->getMessage();
}
$connection->close();
//try {
//    $mysql = new mysqli("localhost", "root", "", $dbname = "dbname");
//    $mysql-> query("SET NAMEs 'utf8'");
//
//    $mysql->query("CREATE DATABASE IF NOT EXISTS`$dbname`");
//    $mysql-> query("CREATE TABLE IF NOT EXISTS`users` (
//  `id` int(20) NOT NULL  AUTO_INCREMENT,
//  `name` varchar(255) NOT NULL,
//  `surname` varchar(255) NOT NULL,
//  `phoneNumber` int(11) NOT NULL,
//  PRIMARY KEY (id);
//)");
//
//    $mysql->query("INSERT INTO `users`(`name`, `surname`, `phoneNumber`) VALUES ($name,$surname,$phoneNumber");
//    $results = $mysql-> query("SELECT * FROM `$dbname`")->fetch_all(MYSQLI_ASSOC);
//    foreach ($results as $result) {
//            echo "<pre>";
//        print_r($result);
//        echo "result name";
//            echo "</pre>";
//    }
//    $mysql-> close();
//} catch (PDOException $e) {
//    throw new Exception($e->getMessage());
//}

//    if ($mysql->connect_error) {
//        echo "Error: ".$mysql->connect_error;
//    } else {

    require_once "blocks/footer.php";
?>
