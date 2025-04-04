<!DOCTYPE html>
<html>
<head>
    <title>Считаем количество типов предложений</title>
</head>
<body>
    <form method="post">
    <textarea name="text"><?php if(isset($_POST["text"])) { echo $_POST["text"]; } ?></textarea>
    <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $text = $_POST["text"];
        $dot = preg_match_all('/[.](?!\w)/u', $text);
        $exclamation = preg_match_all('/[!](?!\w)/u', $text);
        $question = preg_match_all('/[?](?!\w)/u', $text);

        echo "Количество предложений с точкой: $dot<br>";
        echo "Количество предложений с восклицательным знаком: $exclamation<br>";
        echo "Количество предложений с вопросительным знаком: $question";
    }
    ?>
</body>
</html>
