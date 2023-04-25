<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問４ -->
    <form method="post" action="answer.php">
        <p>問４：計算して下さい。<br>
            ※負の解にならない問題作成をしてください。<br>
            ※割り算の解が小数点にならない問題の作成をしてください。<br>
        </p>
        <?php
        $correct_answers = array();
        for ($i = 0; $i < 10; $i++) {
            $num1 = rand(10, 20);
            $num2 = rand(1, 10);
            $operator = rand(1, 4);
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
                    $problem = "$num1 ÷ $num2 = ";
                    try {
                        // $num2が０である時
                        if ($num2 == 0) {
                            // エラー処理（＝意図しないエラーが発生した時に備えて対策する）
                            throw new Exception('0で割れません');
                        } else {
                            // 割り算の結果を整数にする
                            // (int)は、括弧内の値を整数に変換するため
                            $seikai = (int)($num1 / $num2);
                        }
                        //エラーが発生した場合に実行
                    } catch (Exception $e) {
                        $seikai = 'エラー';
                    }
                    break;
            }
            $correct_answers[$i] = $seikai;
            // 各問題の回答が name='answers[]'として送信される。（[]は変数が配列であることを意味する）
            echo "<p>$problem<input type='text' name='answers[]'></p>";
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