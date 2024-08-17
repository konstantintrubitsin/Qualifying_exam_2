<?php
$mysqli = new mysqli("localhost", "root", "root", "help_system");

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
?>
