<?php
session_start(); // Обязательно вызываем session_start() в начале каждого файла, использующего сессии
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Ввод данных пользователя</title>
</head>

<body>

    <h2>Введите ваши данные:</h2>
    <form action="4.php" method="post">
        <!-- Отправляем данные обратно на этот же файл -->
        <label for="university">Название университета:</label>
        <input type="text" id="university" name="university" required><br><br>

        <label for="faculty">Факультет:</label>
        <input type="text" id="faculty" name="faculty" required><br><br>

        <label for="course">Курс:</label>
        <select id="course" name="course" required>
            <option value="1">1 курс</option>
            <option value="2">2 курс</option>
            <option value="3">3 курс</option>
            <option value="4">4 курс</option>
            <option value="5">5 курс</option>
            <option value="6">6 курс</option>
        </select><br><br>

        <input type="submit" value="Сохранить данные">
        <a href="save.php">Посмотреть данные</a>
        <!-- Ссылка на страницу просмотра -->
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем данные из формы
        $university = htmlspecialchars($_POST["university"]); // Безопасность: экранируем ввод
        $faculty = htmlspecialchars($_POST["faculty"]); // Безопасность: экранируем ввод
        $course = htmlspecialchars($_POST["course"]); // Безопасность: экранируем ввод

        // Сохраняем данные в сессию
        $_SESSION["university"] = $university;
        $_SESSION["faculty"] = $faculty;
        $_SESSION["course"] = $course;

        echo "<p style='color: green;'>Данные успешно сохранены в сессию!</p>";
    }
    ?>

</body>

</html>
