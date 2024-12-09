<?php include 'includes/header.php';?>
<h2>О работе с клиентами</h2>

<form action="submit_application.php" method="POST">
    <label>Имя:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Телефон:</label>
    <input type="text" name="phone" required><br>

    <label>Сообщение:</label>
    <textarea name="message" required></textarea><br>

    <button type="submit">Отправить</button>
</form>

<?php include 'includes/footer.php'; ?>
