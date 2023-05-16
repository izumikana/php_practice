<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- index.phpで最大出題数の設定をできるようにしてください。
index.phpで計算式の最小、最大値を設定できるようにしてください。 -->
    <form action="answer.php" method="POST">
        <?php
        $start_time = microtime(true);
        echo "<input type='hidden' name='start_time' value='$start_time'>";
        ?>
    </form>
    <p>演算子を選択し開始ボタンで始めてください。</p>
    <form method="post" action="question.php">
        <label for="operator">演算子を選択：</label>
        <select name="operator" id="operator">
            <option value="all">全て</option>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">×</option>
            <option value="divide">÷</option>
        </select>
        <br>
        <label for="max_questions">最大出題数：</label>
        <input type="number" name="max_questions" id="max_questions">
        <br>
        <label for="min_value">最小値：</label>
        <input type="number" name="min_value" id="min_value" value="<?php echo $defaultMinValue; ?>">
        <br>
        <label for="max_value">最大値：</label>
        <input type="number" name="max_value" id="max_value" value="<?php echo $defaultMaxValue; ?>">
        <br>
        <br>
        <br>
        <input type="submit" value="問題を作成する">
    </form>
</body>

</html>