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

    <p>問２回答結果</p>
    <?php
    $correct_answers = $_POST['correct_answers'];
    $user_answers = $_POST['answers'];

    for ($i = 0; $i < count($correct_answers); $i++) {
        // 正解配列（=$correct_answers）とユーザー回答（=$user_answers）
        if ($user_answers[$i] == $correct_answers[$i]) {
            echo "<p>問題" . ($i + 1) . "：正解</p>";
        } else {
            echo "<p>問題" . ($i + 1) . "：不正解（正解：" . $correct_answers[$i] . "）</p>";
        }
    }
    ?>