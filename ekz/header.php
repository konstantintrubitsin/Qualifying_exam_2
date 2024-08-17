<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header class="bg-primary text-white text-center py-3">
    <h1>Сервис техподдержки "Help!!!"</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Help!!!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tickets.php">Мои заявки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_ticket.php">Создать заявку</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Админ Панель</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container my-4">
