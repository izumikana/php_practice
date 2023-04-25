<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>答え合わせ</title>
</head>

<body>
    <p>問４回答結果</p>
    <?php
    $correct_answers = $_POST['correct_answers'];
    $user_answers = $_POST['answers'];
    ob_start();
    include("../課題4/index.php");
    ob_clean();

    for ($i = 0; $i < count($correct_answers); $i++) {
        // 各回答に対して!is_numeric()関数を使って数値かどうか判定
        if (!is_numeric($user_answers[$i])) {
            echo "<p>問題" . ($i + 1) . "：エラー</p>";
            // 正解配列（=$correct_answers）とユーザー回答（=$user_answers）
            // round(数値,桁数)は、引数の数値を桁数まで表示するように四捨五入    
        } else if (round($user_answers[$i], 3) == round($correct_answers[$i], 3)) {
            echo "<p>問題" . ($i + 1) . "：正解</p>";
        } else {
            echo "<p>問題" . ($i + 1) . "：不正解（正解：" . $correct_answers[$i] . "）</p>";
        }
    }
    ?>