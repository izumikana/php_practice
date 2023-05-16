<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>答え合わせ</title>
</head>

<body>
    <p>問５回答結果</p>
    <?php
    $correct_answers = $_POST['correct_answers'];
    $user_answers = $_POST['answers'];

    // 変数を空の文字列で初期化する
    $start_time = 0.0;
    if (isset($_POST['start_time'])) {
        // POSTされた値を変数に割り当てる
        $start_time = (float)$_POST['start_time'];
    }
    //現在時刻の時間
    $end_time = microtime(true);
    $total_time = round($end_time - $start_time, 2); // 回答までの時間

    for ($i = 0; $i < count($correct_answers); $i++) {
        // 各回答に対して!is_numeric()関数を使って数値かどうか判定
        if (!is_numeric($user_answers[$i])) {
            echo "<p>問題" . ($i + 1) . "：エラー</p>";
            // 正解配列（=$correct_answers）とユーザー回答（=$user_answers）  
        } else if ($user_answers[$i] == ($correct_answers[$i])) {
            echo "<p>問題" . ($i + 1) . "：正解</p>";
        } else {
            echo "<p>問題" . ($i + 1) . "：不正解（正解：" . $correct_answers[$i] . "）</p>";
        }
    }

    // 回答までの時間を表示
    echo "<p>回答までの時間：" . $total_time . "秒</p>";

    // 正解数を計算
    $num_correct = 0;
    for ($i = 0; $i < count($_POST['answers']); $i++) {
        if ($_POST['answers'][$i] == $_POST['correct_answers'][$i]) {
            $num_correct++;
        }
    }

    // 正解数を表示
    echo "<p>正解数：" . $num_correct . "/" . count($_POST['answers']) . "</p>";
    ?>