<?php
$title = "Создать заявку";
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $mysqli->real_escape_string($_POST['category']);
    $description = $mysqli->real_escape_string($_POST['description']);
    $department = $mysqli->real_escape_string($_POST['department']);

    $sql = "INSERT INTO tickets (user_id, department, category, description) VALUES ('$user_id', '$department', '$category', '$description')";
    if ($mysqli->query($sql)) {
        header("Location: tickets.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Ошибка: ' . $mysqli->error . '</div>';
    }
}

include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center">Создать новую заявку</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Отдел</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
