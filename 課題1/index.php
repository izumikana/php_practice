<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問１ -->
    <p>問１：計算して下さい。</p>
    <form method="post" action="answer.php">
        <?php
        // ランダムに2つの数値を生成する
        //最小値と最大値を指定
        $a = rand(1, 100);
        $b = rand(1, 100);

        // ランダムに演算子を生成する
        // 1~4の乱数が$operator変数に代入
        $operator = rand(1, 4);
        switch ($operator) {
            case 1:
                $op_sign = "+";
                $answer = $a + $b;
                break;
            case 2:
                $op_sign = "-";
                $answer = $a - $b;
                break;
            case 3:
                $op_sign = "×";
                $answer = $a * $b;
                break;
            case 4:
                $op_sign = "÷";
                // 除数が0になる場合は再生成する
                do {
                    $b = rand(1, 100);
                } while ($a % $b != 0);
                $answer = $a / $b;
                break;
        }
        // 問題文を表示する
        echo "<span>{$a} {$op_sign} {$b} = </span>";
        // 回答欄を表示する
        echo "<input type='number' name='answer'>";
        // 回答の正解をhiddenで送信する(＝ユーザーが回答を送信したときにサーバーサイドで回答を検証する必要がある為)
        echo "<input type='hidden' name='correct_answer' value='{$answer}'>";
        // ランダムで生成した問題の種類をhiddenで送信する
        echo "<input type='hidden' name='operator' value='{$op_sign}'>";
        ?>
        <p><input type="submit" value="回答する"></p>
    </form>
</body>

</html>

<!-- <?php
        $op = ['×', '-', '÷', '＋'];
        //$opの配列から値を一つ取り出す、array_randは配列のキー（0,1,2,3...）で返ってくる
        $a_op = array_rand($op);
        // キーで返ってきたものを値で表示する
        echo $op[$a_op];
        ?> -->