<?php
$title = "Мои заявки";
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $mysqli->query("SELECT * FROM tickets WHERE user_id='$user_id'");

include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="text-center">Мои заявки</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($ticket = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $ticket['id']; ?></td>
                    <td><?php echo $ticket['category']; ?></td>
                    <td><?php echo $ticket['description']; ?></td>
                    <td><?php echo $ticket['status']; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
