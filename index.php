
<?php
    $title = "Главная страница";
    require_once "blocks/header.php";
?>
<div class="container mt-2">
    <h1>Главная страница</h1>
    <form action="result.php" method="post">
        <input type="text" name="name" placeholder="Введите имя" class="form-control"><br>
        <input type="text" name="surname" placeholder="Введите фамилию" class="form-control"><br>
        <input type="text" name="phoneNumber" placeholder="Введите номер телефона" class="form-control"><br>
        <input type="submit" value="Сохранить" class="btn btn-success">
    </form>
</div>

<?php
    require_once "blocks/footer.php";


