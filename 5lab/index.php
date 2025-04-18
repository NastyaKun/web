// Вариант 17: Сад, Огород, Дача

<?php
// Настройка категорий
$categories = ["Сад", "Огород", "Дача"];

// Создание директории, если она не существует
function createDirectoryIfNotExists($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Создаем директории для категорий
foreach ($categories as $category) {
    createDirectoryIfNotExists($category);
}

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); // Валидация email
    $category = $_POST["category"];
    $title = trim(preg_replace("/[^a-zA-Zа-яА-Я0-9\s]+/u", "", $_POST["title"]));
    $content = $_POST["content"];

    // Проверка на заполненность и валидация email
    if ($email && in_array($category, $categories) && !empty($title) && !empty($content)) {
        // Формирование имени файла: категория/заголовок_объявления.txt
        $filename = $category . "/" . str_replace(" ", "_", $title) . ".txt";
        $filename = preg_replace("/[^a-zA-Zа-яА-Я0-9_.\-\/]/u", "", $filename);
        // Запись данных в файл
        if (file_put_contents($filename, "Email: " . $email . "\n\n" . $content)) {
            $message = "Объявление успешно добавлено!";
        } else {
            $error = "Ошибка при записи в файл. Проверьте права на запись.";
        }
    } else {
        $error = "Пожалуйста, заполните все поля корректно.";
    }
}

// Список объявлений из файлов
$ads = [];
foreach ($categories as $category) {
    $files = glob($category . "/*.txt");
    if ($files) {
        foreach ($files as $file) {
            $content = file_get_contents($file);
            $title = pathinfo($file, PATHINFO_FILENAME);
            $ads[] = [
                "category" => $category,
                "title" => $title,
                "content" => $content
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Доска объявлений (Вариант 17)</title>
    <meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; width: 100%; }
        td, th { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        textarea { width: 300px; height: 150px; }
        pre { white-space: pre-wrap; word-break: break-word; } /* Для корректного отображения текста в <pre> */
    </style>
</head>
<body>
    <h2>Добавить объявление</h2>
    <?php if (isset($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Категория:
        <select name="category" required>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
            <?php endforeach; ?>
        </select><br><br>
        Заголовок: <input type="text" name="title" required><br><br>
        Текст объявления:<br>
        <textarea name="content" rows="5" cols="40" required></textarea><br>
        <button type="submit">Добавить</button>
    </form>

    <h2>Список объявлений</h2>

    <?php if (empty($ads)): ?>
        <p>Нет объявлений.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Категория</th>
                    <th>Заголовок</th>
                    <th>Содержание</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ads as $ad): ?>
                    <tr>
                        <td><?= htmlspecialchars($ad["category"]) ?></td>
                        <td><?= htmlspecialchars($ad["title"]) ?></td>
                        <td><pre><?= htmlspecialchars($ad["content"]) ?></pre></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>
