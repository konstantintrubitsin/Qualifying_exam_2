<?php
$title = "Главная";
include 'db.php';
include 'header.php';
?>

<div class="text-center">
    <img src="images/banner.png" class="img-fluid" alt="Баннер">
    <h2>Добро пожаловать в сервис техподдержки "Help!!!"</h2>
    <p>Автоматизация процессов техподдержки для вашей компании.</p>
    <a href="register.php" class="btn btn-primary">Регистрация</a>
    <a href="login.php" class="btn btn-secondary">Авторизация</a>
</div>

<?php include 'footer.php'; ?>
