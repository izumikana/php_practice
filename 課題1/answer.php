<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>答え合わせ</title>
</head>

<body>
    <p>問１回答結果</p>
    <?php
    // POSTされた回答と正解を取得する
    $answer = $_POST["answer"];
    $correct_answer = $_POST["correct_answer"];
    $operator = $_POST["operator"];

    // 回答を判定する
    if ($answer == $correct_answer) {
        echo "<p>正解です！</p>";
    } else {
        echo "<p>不正解です…。正解は {$operator} {$correct_answer} でした。</p>";
    }
    ?>