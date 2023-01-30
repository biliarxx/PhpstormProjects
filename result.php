
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
        $sqlDataBase = "CREATE DATABASE IF NOT EXISTS dbname";
    }
    if ($connection->query($sqlDataBase)) {
        $connectionTable = new mysqli('localhost','root','', 'dbname');
        $sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (id int(20) NOT NULL  AUTO_INCREMENT, 
             user_name varchar(255) NOT NULL, 
             surname varchar(255) NOT NULL, 
             phoneNumber int(11) NOT NULL, 
              PRIMARY KEY (id))";
        if ($connectionTable->query($sqlCreateTable)){
            $sqlInsertTable = "INSERT INTO `users`(`name`, `surname`, `phoneNumber`) VALUES ('".$name."','".$surname."','".$phoneNumber."')";
            if($connectionTable->query($sqlInsertTable)){
                $results = $connectionTable -> query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);
                echo "<pre>";
                print_r($results);
                echo "</pre>";
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
$connection->close();
$connectionTable->close();

require_once "blocks/footer.php";
?>
<table>
    <tr>
        <th>Company</th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th>
    </tr>
    <tr>
        <td>Microsoft</td><td>20.3</td><td>30.5</td><td>23.5</td><td>40.3</td>
    </tr>
    <tr>
        <td>Google</td><td>50.2</td><td>40.63</td><td>45.23</td><td>39.3</td>
    </tr>
    <tr>
        <td>Apple</td><td>25.4</td><td>30.2</td><td>33.3</td><td>36.7</td>
    </tr>
</table>