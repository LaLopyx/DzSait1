<?php
include 'includes/db.php';
include 'includes/header.php';
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ассортимент</title>
</head>
<body>
    <main>
        <h2>Наш ассортимент</h2>

        <div class="products-container">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-item">';
                    echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" class="product-img">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p><strong>Цена:</strong> ' . $row['price'] . ' руб/1 м3</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Товары не найдены.</p>';
            }
            ?>
        </div>

    </main>

    <footer>
        <p>&copy; 2024 Деревообрабатывающий комплекс. Все права защищены.</p>
    </footer>
</body>
</html>
