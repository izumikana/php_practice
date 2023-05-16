<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>答え合わせ</title>
</head>

<body>
    <p>問７ 回答結果</p>
    <?php
    $correct_answers = $_POST['answer'] ?? array();
    $user_answers = $_POST['answers'];

    // 変数の初期化
    $start_time = 0.0;
    if (isset($_POST['start_time'])) {
        $start_time = (float)$_POST['start_time'];
    }
    $end_time = microtime(true);
    $total_time = round($end_time - $start_time, 2);

    for ($i = 0; $i < count($correct_answers); $i++) {
        if (!is_numeric($user_answers[$i])) {
            echo "<p>問題" . ($i + 1) . "：エラー</p>";
        } else if ($user_answers[$i] == $correct_answers[$i]) {
            echo "<p>問題" . ($i + 1) . "：正解</p>";
        } else {
            echo "<p>問題" . ($i + 1) . "：不正解（正解：" . $correct_answers[$i] . "）</p>";
        }
    }

    echo "<p>回答までの時間：" . $total_time . "秒</p>";

    $num_correct = 0;
    for ($i = 0; $i < count($user_answers); $i++) {
        if ($user_answers[$i] == $correct_answers[$i]) {
            $num_correct++;
        }
    }

    echo "<p>正解数：" . $num_correct . "/" . count($user_answers) . "</p>";
    ?>