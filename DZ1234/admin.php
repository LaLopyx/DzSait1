<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $new_status, $application_id);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM applications");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Админ-панель</title>
</head>
<body>
    <h2>Заявки клиентов</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Сообщение</th>
            <th>Дата</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['phone']); ?></td>
            <td><?= htmlspecialchars($row['message']); ?></td>
            <td><?= $row['created_at']; ?></td>
            <td><?= htmlspecialchars($row['status']); ?></td>
            <td>
                <form method="POST" style="display: inline-block;">
                    <input type="hidden" name="application_id" value="<?= $row['id']; ?>">
                    <select name="status">
                        <option value="Новый" <?= $row['status'] == 'Новый' ? 'selected' : ''; ?>>Новый</option>
                        <option value="В обработке" <?= $row['status'] == 'В обработке' ? 'selected' : ''; ?>>В обработке</option>
                        <option value="Завершено" <?= $row['status'] == 'Завершено' ? 'selected' : ''; ?>>Завершено</option>
                    </select>
                    <button type="submit" name="update_status">Обновить</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="logout.php">Выйти</a>
</body>
</html>
