<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Контактная информация</title>
    <script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
</head>
<body>
    <main>
        <h2>Контактная информация</h2>

        <div class="contact-info">
            <p><strong>Адрес:</strong> ул. Лесная, д. 12, г. Москва, Россия</p>
            <p><strong>Телефон:</strong> +7 (495) 123-45-67</p>
            <p><strong>Email:</strong> info@woodworks.ru</p>
            <p><strong>Режим работы:</strong> Пн-Пт с 9:00 до 18:00</p>
        </div>

        <h3>Мы на карте:</h3>

        <div id="map" style="width: 100%; height: 400px;"></div>

        <script>
            ymaps.ready(function () {
                var myMap = new ymaps.Map("map", {
                    center: [54.935061, 37.383890],
                    zoom: 17});

                var myPlacemark = new ymaps.Placemark([54.935061, 37.383890], {
                    balloonContent: 'Наш офис: ул. Лесная, д. 12, г. Москва'});
                myMap.geoObjects.add(myPlacemark);});
        </script>
    </main>

    <footer>
        <p>&copy; 2024 Деревообрабатывающий комплекс. Все права защищены.</p>
    </footer>

</body>
</html>
