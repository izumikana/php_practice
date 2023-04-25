<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>答え合わせ</title>
</head>

<body>
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