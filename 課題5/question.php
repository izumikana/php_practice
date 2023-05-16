<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問５ -->

    <p>問５：計算して下さい。<br>
        回答までの時間を計測して、答え合わせのページに表示してください。<br>
        何問正解したか表示してください。 例）4/10
    </p>
    <form method="post" action="answer.php">
        <?php

        $correct_answers = array();
        for ($i = 0; $i < 10; $i++) {
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            $operator = rand(1, 4);
            // 商の計算
            $quotient = (int) ($num1 / $num2);

            switch ($operator) {
                case 1:
                    $problem = "$num1 + $num2 = ";
                    $seikai = $num1 + $num2;
                    break;
                case 2:
                    $problem = "$num1 - $num2 = ";
                    $seikai = $num1 - $num2;
                    break;
                case 3:
                    $problem = "$num1 × $num2 = ";
                    $seikai = $num1 * $num2;
                    break;
                case 4:
                    // $num1を$num2の倍数にすることで小数点にならないようにする
                    $num1 = $num2 * rand(1, 10);
                    $problem = "$num1 ÷ $num2 = ";
                    $seikai = $quotient;
                    break;
            }
            $correct_answers[$i] = $seikai;
            // 各問題の回答が name='answers[]'として送信される。（[]は変数が配列であることを意味する）
            echo "<p>$problem<input type='text' required name='answers[]'></p>";
            echo "<input type='hidden' name='correct_answers[]' value='$seikai'>";
        }
        ?>
        <input type="submit" value="回答する">
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