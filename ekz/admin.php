<?php
$title = "Админ Панель";
include 'db.php';
session_start();

if (!isset($_SESSION['admin'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if ($login == 'help' && $password == 'helpme') {
            $_SESSION['admin'] = true;
        } else {
            echo '<div class="alert alert-danger" role="alert">Неверный логин или пароль.</div>';
        }
    } else {
        include 'header.php';
        // Форма авторизации администратора
        echo '<div class="row justify-content-center"><div class="col-md-6">';
        echo '<form method="post" action="">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
              </form>';
        echo '</div></div>';
        include 'footer.php';
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['status'])) {
    $status = $mysqli->real_escape_string($_POST['status']);
    $ticket_id = $mysqli->real_escape_string($_POST['ticket_id']);
    $mysqli->query("UPDATE tickets SET status='$status' WHERE id='$ticket_id'");
}

$result = $mysqli->query("SELECT tickets.*, users.fullname, users.department FROM tickets INNER JOIN users ON tickets.user_id = users.id");

include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="text-center">Все заявки</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Отдел</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($ticket = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $ticket['id']; ?></td>
                    <td><?php echo $ticket['fullname']; ?></td>
                    <td><?php echo $ticket['department']; ?></td>
                    <td><?php echo $ticket['category']; ?></td>
                    <td><?php echo $ticket['description']; ?></td>
                    <td><?php echo $ticket['status']; ?></td>
                    <td>
                        <?php if ($ticket['status'] == 'новое'): ?>
                            <form method="post" action="">
                                <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                                <select name="status" class="form-select">
                                    <option value="в процессе">в процессе</option>
                                    <option value="выполнено">выполнено</option>
                                    <option value="отменено">отменено</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Обновить</button>
                            </form>
                        <?php else: ?>
                            Нет действий
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
