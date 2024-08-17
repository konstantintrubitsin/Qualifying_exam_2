<?php
$title = "Регистрация";
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $mysqli->real_escape_string($_POST['fullname']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = password_hash($mysqli->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, phone, email, password) VALUES ('$fullname', '$phone', '$email', '$password')";
    if ($mysqli->query($sql)) {
        echo '<div class="alert alert-success" role="alert">Регистрация успешна!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Ошибка: ' . $mysqli->error . '</div>';
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center">Регистрация</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="fullname" class="form-label">ФИО</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
