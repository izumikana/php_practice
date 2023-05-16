<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <form action="answer.php" method="POST">
        <?php
        $start_time = microtime(true);
        echo "<input type='hidden' name='start_time' value='$start_time'>";
        ?>
    </form>

    <p>開始ボタンを押して計算を始めてください。</p>
    <button onclick="location.href='question.php'">開始ボタン</button>
</body>

</html>