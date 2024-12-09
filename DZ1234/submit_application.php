<?php
include 'includes/db.php';
include 'includes/header.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $phone, $message);
    $stmt->execute();
    $stmt->close();

    echo 'Заявка успешно отправлена!';
}
?>
