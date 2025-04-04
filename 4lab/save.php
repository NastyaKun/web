<?php
session_start(); // Обязательно вызываем session_start()
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Отображение данных пользователя</title>
</head>

<body>

    <h2>Ваши данные:</h2>

    <?php
    // Проверяем, установлены ли переменные сессии
    if (isset($_SESSION["university"]) && isset($_SESSION["faculty"]) && isset($_SESSION["course"])) {
        $university = $_SESSION["university"];
        $faculty = $_SESSION["faculty"];
        $course = $_SESSION["course"];

        echo "<p><b>Название университета:</b> " . $university . "</p>";
        echo "<p><b>Факультет:</b> " . $faculty . "</p>";
        echo "<p><b>Курс:</b> " . $course . " курс</p>";
    } else {
        echo "<p style='color: red;'>Данные не найдены. Пожалуйста, <a href='form.php'>заполните форму</a>.</p>";
    }
    ?>

    <br>
    <a href="4.php">Вернуться к форме</a>

</body>

</html>
